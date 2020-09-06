<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User.
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User implements UserInterface
{
    /**
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private int $id;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    /**
     * @ORM\Column(name="email", type="string", length=128, nullable=false)
     */
    private string $email;

    public function getUsername()
    {
        return $this->email;
    }

    public function getEmailAdress()
    {
        return $this->email;
    }

    public function setEmailAdress($value)
    {
        $this->email = $value;
    }

    /**
     * @var binary|null
     *
     * @ORM\Column(name="email_confirmed", type="binary", nullable=true)
     */
    private bool $emailConfirmed;

    public function getEmailConfirmed()
    {
        return $this->emailConfirmed;
    }

    public function setEmailConfirmed($value)
    {
        $this->emailConfirmed = $value;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=160, nullable=true, options={"comment"="SHA-512 hash av lösenord."})
     */
    private string $password;

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($value)
    {
        $this->password = $value;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="salt", type="string", length=130, nullable=true)
     */
    private string $salt;

    public function getSalt()
    {
        return $this->salt;
    }

    public function setSalt($value)
    {
        $this->salt = $value;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="firstname", type="string", length=64, nullable=true)
     */
    private string $firstname;

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($value)
    {
        $this->firstname = $value;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="lastname", type="string", length=64, nullable=true)
     */
    private string $lastname;

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($value)
    {
        $this->lastname = $value;
    }

    /**
     * @ORM\Column(name="api_token", type="string", length=256, unique=true, nullable=true)
     */
    private $apiToken;

    public function getApiToken()
    {
        return $this->apiToken;
    }

    public function setApiToken($value)
    {
        $this->apiToken = $value;
    }

    /**
     * @return array|string[]
     */
    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    public function eraseCredentials()
    {
    }
}
