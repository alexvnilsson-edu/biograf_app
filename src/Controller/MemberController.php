<?php

namespace App\Controller;

use App\Service\MemberManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;

/**
 * @Route("/medlemmar", name="members_")
 */
class MemberController extends AbstractController {
    #protected CsrfTokenManagerInterface $csrfTokenManager;

    public function __construct()
    {
        #$this->csrfTokenManager = $csrfTokenManager;
    }

    /**
     * @Route("/registrering", name="registrering", methods={"GET"})
     */
    public function registrering() {
        return $this->render("member/registrering.html.twig");
    }

    /**
     * @Route("/inloggning", name="inloggning", methods={"GET"})
     */
    public function inloggning() {
        return $this->render("member/inloggning.html.twig");
    }
}