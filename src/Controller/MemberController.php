<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/medlemmar", name="members_")
 */
class MemberController extends AbstractController {
    /**
     * @Route("/registrera", name="index", methods={"GET"})
     */
    public function registrera() {
        return $this->render("member/register.html.twig");
    }

    /**
     * @Route("/inloggning", name="index", methods={"GET"})
     */
    public function loggain() {
        return $this->render("member/login.html.twig");
    }
}