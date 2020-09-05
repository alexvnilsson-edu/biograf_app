<?php

namespace App\Service;

use App\Entity\KundInloggning;
use App\Entity\KundPerson;
use App\Form\Type\MemberAuthenticationType;
use App\Form\Type\MemberType;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class MemberManager {
    public static string $CSRF_TOKEN_NAME = "member-authentication";

    // Vilken krypteringsalogirithm vi vill använda, kolla tillgängliga algos med hash_algos().
    protected static string $PASSWORD_HASH_ALGORITHM = "sha512";
    

    protected EntityManagerInterface $entityManager;

    protected JWTTokenManagerInterface $tokenManager;

    public function __construct(EntityManagerInterface $entityManager, JWTTokenManagerInterface $tokenManager)
    {
        $this->entityManager = $entityManager;
        $this->tokenManager = $tokenManager;
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

    public function create(MemberType $memberType, bool $dryRun = false) {
        $member = new KundInloggning();
        $member->setEmailAdress($memberType->email);
        $member->setLösenordSalt($this->createSalt());
        $member->setLösenord($this->createHashedPassword($memberType->password, $member->getLösenordSalt()));
        $member->setFörnamn($memberType->firstname);
        $member->setEfternamn($memberType->surname);

        $this->entityManager->persist($member);

        if (!$dryRun) {
            $this->entityManager->flush();
        } else {
            $member->setId(random_int(1, 100));
        }

        return $member;
    }

    public function authenticate(MemberAuthenticationType $memberAuthentication) {
        $member = $this->entityManager->getRepository(KundInloggning::class)->findOneBy([
            "emailAdress" => $memberAuthentication->email
        ]);

        if (!$member) {
            throw new Exception("Hittade ingen medlem med epostadressen " . $memberAuthentication->email);
        }

        $matchPassword = $this->createHashedPassword($memberAuthentication->password, $member->getLösenordSalt());

        // 0: likamed, större än/mindre än 0: inte likamed
        if (strcmp($member->getLösenord(), $matchPassword) != 0) {
            throw new Exception("Felaktig inloggning.");
        }

        return $member;
    }
    
    public function get(int $id) {
        $member = $this->entityManager->getRepository(KundInloggning::class)->find($id);

        if (!$member) {
            throw new Exception(
                "Hittade ingen medlem med ID " . $id
            );
        }

        return $member;
    }

    private function getToken(KundInloggning $member): string {
        return $this->tokenManager->create($member);
    }
}