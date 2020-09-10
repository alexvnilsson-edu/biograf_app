<?php

namespace App\Service;

use App\Entity\KundInloggning;
use App\Entity\KundPerson;
use App\Entity\User;
use App\Form\Type\MemberAuthenticationType;
use App\Form\Type\MemberType;
use App\Form\Type\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class MemberManager
{
    public static string $CSRF_TOKEN_NAME = "member-authentication";

    // Vilken krypteringsalogirithm vi vill använda, kolla tillgängliga algos med hash_algos().
    protected static string $PASSWORD_SALT_HASH_ALGORITHM = "sha1";
    protected static string $PASSWORD_HASH_ALGORITHM = "sha512";
    

    private EntityManagerInterface $entityManager;
    private JWTTokenManagerInterface $tokenManager;
    private UserPasswordEncoderInterface $passwordEncoder;

    public function __construct(EntityManagerInterface $entityManager, JWTTokenManagerInterface $tokenManager, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->entityManager = $entityManager;
        $this->tokenManager = $tokenManager;
        $this->passwordEncoder = $passwordEncoder;
    }

    private function createSalt(User $user)
    {
        // Här använder vi random_int istället för rand/mt_rand
        // Läs mer: https://www.php.net/manual/en/function.random-int.php
        $r = random_int((PHP_INT_MIN + 512), (PHP_INT_MAX - 512));
        return hash(MemberManager::$PASSWORD_SALT_HASH_ALGORITHM, $r . $user->getEmail());
    }

    private function createHashedPassword(string $password, string $salt)
    {
        return hash(MemberManager::$PASSWORD_HASH_ALGORITHM, $salt . $password);
    }

    public function create(UserType $userForm)
    {
        $user = new User();
        $user
            ->setEmail($userForm->getEmail())
            ->setSalt($this->createSalt($user))
            ->setPassword($this->passwordEncoder->encodePassword($user, $userForm->getPassword()))
            ->setFirstname($userForm->getFirstname())
            ->setLastName($userForm->getLastname());

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }

    public function authenticate(MemberAuthenticationType $memberAuthentication)
    {
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
    
    public function get(int $id)
    {
        $member = $this->entityManager->getRepository(KundInloggning::class)->find($id);

        if (!$member) {
            throw new Exception(
                "Hittade ingen medlem med ID " . $id
            );
        }

        return $member;
    }

    private function getToken(KundInloggning $member): string
    {
        return $this->tokenManager->create($member);
    }
}
