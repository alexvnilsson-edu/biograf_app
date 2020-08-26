<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController {
    /**
     * @Route("/", name="index")
     */
    public function index() {
        $customerRegisterUrl = $this->generateUrl("customer_register");

        return $this->render("index/index.html.twig", [
            "registration_form" => [
                "action" => $customerRegisterUrl
            ]
        ]);
    }
}