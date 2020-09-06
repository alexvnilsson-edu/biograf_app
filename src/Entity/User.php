<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Serializable;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\Column(name="email", type="string", length=128, nullable=false, unique=true)
     */
    private string $email;

    public function getUsername()
    {
        return $this->email;
    }

    public function getEmail()
    {
        return $this->email;
    }
    
    public function setEmail($value)
    {
        $this->email = $value;
    }

    /**
     * @var binary|null
     *
     * @ORM\Column(name="email_confirmed", type="binary", nullable=true)
     */
    private ?bool $emailConfirmed = false;

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
     * @Assert\NotBlank
     * @Assert\Regex(
     *      pattern="/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/",
     *      message="Use 1 upper case letter, 1 lower case letter, and 1 number"
     * )
     */
    private ?string $plainPassword;

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }
    
    public function setPlainPassword($value)
    {
        $this->plainPassword = $value;
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

    private array $roles = array();

    /**
     * @return array|string[]
     */
    public function getRoles()
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $value)
    {
        $this->roles = $value;
    }

    public function eraseCredentials()
    {
        $this->setPlainPassword(null);
    }

    /**
     * Internal methods
     */

    // public function serialize()
    // {
    //     return serialize(array(
    //         $this->id,
    //         $this->email,
    //         $this->emailConfirmed,
    //         $this->password,
    //         $this->salt,
    //         $this->firstname,
    //         $this->lastname,
    //         $this->apiToken
    //     ));
    // }

    // public function unserialize($serialized)
    // {
    //     list(
    //         $this->id,
    //         $this->email,
    //         $this->emailConfirmed,
    //         $this->password,
    //         $this->salt,
    //         $this->firstname,
    //         $this->lastname,
    //         $this->apiToken
    //         ) = unserialize($serialized);
    // }
}
