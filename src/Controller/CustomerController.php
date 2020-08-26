<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Form\Type\CustomerType;

class CustomerController extends AbstractController {
    /**
     * @Route("/customer/register", name="customer_register", methods={"GET", "POST"})
     */
    public function register(Request $request) {
        $customer = new CustomerType();
        $form = $this->createForm(CustomerType::class, $customer);

        $form->handleRequest($request);
        $customer = $form->getData();

        if ($form->isSubmitted()) {
            $customer = $form->getData();

            return $this->render("customer/register_success.html.twig", [
                "customer" => $customer
            ]);
        }

        return $this->render("customer/register.html.twig", [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/customer/register/success", name="customer_register_success", methods={"GET"})
     */
    public function register_success() {

    }
}