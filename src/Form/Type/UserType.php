<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Validator\Constraints as Assert;

class UserType extends AbstractType
{
    /**
     * @Assert\NotBlank
     * @Assert\Email(
     *      message = "Angiven e-postadress ({{ value }}) är inte giltig."
     * )
     */
    protected $email;

    /**
     * @Assert\NotBlank
     * @Assert\Length(
     *  max = 4096
     * )
     */
    protected $password;

    /**
     * @Assert\IdenticalTo(propertyPath="password")
     * @Assert\Length(
     *  max = 4096
     * )
     */
    protected $passwordConfirm;

    /**
     * @Assert\NotBlank
     * @Assert\Type("string")
     */
    protected $firstname;

    /**
     * @Assert\Type("string")
     */
    protected $lastname;

    /**
     * @Assert\Type("string")
     */
    protected $_csrf_token;

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("email", EmailType::class)
            ->add("password", PasswordType::class)
            ->add("passwordConfirm", PasswordType::class)
            ->add("firstname", TextType::class)
            ->add("lastname", TextType::class)
            ->add("_csrf_token", HiddenType::class);
    }

    //
    // Getters and setters
    //

    public function getEmail()
    {
        return $this->email;
    }
    
    public function setEmail($value): self
    {
        $this->email = $value;
    
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }
    
    public function setPassword($value): self
    {
        $this->password = $value;
    
        return $this;
    }

    public function getPasswordConfirm()
    {
        return $this->passwordConfirm;
    }
    
    public function setPasswordConfirm($value): self
    {
        $this->passwordConfirm = $value;
    
        return $this;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }
    
    public function setFirstname($value): self
    {
        $this->firstname = $value;
    
        return $this;
    }

    public function getLastname()
    {
        return $this->lastname;
    }
    
    public function setLastname($value): self
    {
        $this->lastname = $value;
    
        return $this;
    }

    public function getCsrfToken()
    {
        return $this->_csrf_token;
    }
    
    public function setCsrfToken($value): self
    {
        $this->_csrf_token = $value;
    
        return $this;
    }
}
