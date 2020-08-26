<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class CustomerType extends AbstractType {
    protected $userEmail;
    protected $userPassword;
    protected $userPasswordConfirm;
    protected $userPersonFirstname;
    protected $userPersonSurname;
    protected $submit;

    public function getUserEmail() {
        return $this->userEmail;
    }

    public function setUserEmail($value) {
        $this->userEmail = $value;
    }

    public function getUserPassword() {
        return $this->userPassword;
    }

    public function setUserPassword($value) {
        $this->userPassword = $value;
    }

    public function getUserPasswordConfirm() {
        return $this->userPasswordConfirm;
    }

    public function setUserPasswordConfirm($value) {
        $this->userPasswordConfirm = $value;
    }

    public function getUserPersonFirstname() {
        return $this->userPersonFirstname;
    }

    public function setUserPersonFirstname($value) {
        $this->userPersonFirstname = $value;
    }

    public function getUserPersonSurname() {
        return $this->userPersonSurname;
    }

    public function setUserPersonSurname($value) {
        $this->userPersonSurname = $value;
    }

    public function getSubmit() {
        return $this->submit;
    }

    public function setSubmit($value) {
        $this->submit = $value;
    }

    // public function get() {
    //     return $this->;
    // }

    // public function set($value) {
    //     $this-> = $value;
    // }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("userEmail", EmailType::class)
            ->add("userPassword", PasswordType::class)
            ->add("userPasswordConfirm", PasswordType::class)
            ->add("userPersonFirstname", TextType::class)
            ->add("userPersonSurname", TextType::class)
            ->add("submit", SubmitType::class);
    }
}