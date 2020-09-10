<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
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
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=128, nullable=false, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="binary", nullable=true)
     */
    private $emailConfirmed = false;

    /**
     * @ORM\Column(type="string", length=160, nullable=true, options={"comment"="SHA-512 hash av lösenord."})
     */
    private $password;

    /**
     * @Assert\NotBlank
     */
    private $plainPassword;

    /**
     * @ORM\Column(type="string", length=130, nullable=true)
     */
    private $salt;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=256, unique=true, nullable=true)
     */
    private $apiToken;
    
    /**
     * @ORM\ManyToMany(targetEntity="MovieScreening")
     * @ORM\JoinTable(name="users_movies",
     *  joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *  inverseJoinColumns={@ORM\JoinColumn(name="movie_id", referencedColumnName="id")})
     */
    private $movieBookings;
    
    private $roles = array();

    public function __construct()
    {
        $this->movieBookings = new ArrayCollection();
    }

    //
    // Getters and setters
    //

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId($value): self
    {
        $this->id = $value;
    
        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->email;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }
    
    public function setEmail($value): self
    {
        $this->email = $value;
    
        return $this;
    }

    public function getEmailConfirmed(): ?bool
    {
        return $this->emailConfirmed;
    }
    
    public function setEmailConfirmed($value): self
    {
        $this->emailConfirmed = $value;
    
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }
    
    public function setPassword($value): self
    {
        $this->password = $value;
    
        return $this;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }
    
    public function setPlainPassword($value): self
    {
        $this->plainPassword = $value;
    
        return $this;
    }

    public function getSalt(): ?string
    {
        return $this->salt;
    }
    
    public function setSalt($value): self
    {
        $this->salt = $value;
    
        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }
    
    public function setFirstname($value): self
    {
        $this->firstname = $value;
    
        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }
    
    public function setLastName($value): self
    {
        $this->lastname = $value;
    
        return $this;
    }

    public function getMovieBookings(): ?ArrayCollection
    {
        return $this->movieBookings;
    }
    
    public function setMovieBookings($value): self
    {
        $this->movieBookings = $value;

        return $this;
    }

    public function getApiToken(): ?string
    {
        return $this->apiToken;
    }
    
    public function setApiToken($value): self
    {
        $this->apiToken = $value;
    
        return $this;
    }

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
}
