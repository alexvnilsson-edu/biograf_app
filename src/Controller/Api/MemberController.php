<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Form\Type\CustomerType;
use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/api/medlemmar", name="api_members_")
 */
class MemberController extends AbstractController {
    /**
     * @Route("", name="post", methods={"POST"})
     */
    public function post(Request $request) {
        $data = json_decode($request->getContent(), true);

        $customer = new CustomerType();
        $form = $this->createForm(CustomerType::class, $customer);
        $form->submit($data);

        if (!$form->isValid()) {
            throw new Exception("Form is invalid.", 0);
        }

        return new Response(json_encode($customer));
    }
}