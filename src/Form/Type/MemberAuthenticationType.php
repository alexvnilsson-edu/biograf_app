<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Validator\Constraints as Assert;

class MemberAuthenticationType extends AbstractType {
    /**
     * @Assert\NotBlank
     * @Assert\Email(
     *      message = "Angiven e-postadress ({{ value }}) är inte giltig."
     * )
     */
    public $email;

    /**
     * @Assert\NotBlank
     */
    public $password;

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("email", EmailType::class)
            ->add("password", PasswordType::class);
    }
}