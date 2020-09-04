<?php

namespace App\Service;

use App\Entity\KundInloggning;
use App\Entity\KundPerson;
use App\Form\Type\MemberType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Filesystem\Exception\IOException;

class MemberManager {
    // Vilken krypteringsalogirithm vi vill använda, kolla tillgängliga algos med hash_algos().
    protected static string $PASSWORD_HASH_ALGORITHM = "sha512";

    protected EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    private function createSalt() {
        // Här använder vi random_int istället för rand/mt_rand
        // Läs mer: https://www.php.net/manual/en/function.random-int.php
        $r = random_int((PHP_INT_MIN + 512), (PHP_INT_MAX - 512));
        return hash(MemberManager::$PASSWORD_HASH_ALGORITHM, $r);
    }

    private function createHashedPassword(string $password, string $salt) {
        return hash(MemberManager::$PASSWORD_HASH_ALGORITHM, $salt . $password);
    }

    public function create(MemberType $memberType) {
        $member = new KundInloggning();
        $member->setEmailAdress($memberType->email);
        $member->setLösenordSalt($this->createSalt());
        $member->setLösenord($this->createHashedPassword($memberType->password, $member->getLösenordSalt()));
        $member->setFörnamn($memberType->firstname);
        $member->setEfternamn($memberType->surname);

        $this->entityManager->persist($member);
        $this->entityManager->flush();
    }
    
    public function get(int $id) {
        $member = $this->entityManager->getRepository(KundInloggning::class)->find($id);

        if (!$member) {
            throw new IOException(
                "Hittade ingen medlem med ID " . $id
            );
        }

        return $member;
    }
}