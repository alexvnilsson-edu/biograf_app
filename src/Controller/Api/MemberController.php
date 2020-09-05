<?php

namespace App\Controller\Api;

use App\Form\Type\MemberAuthenticationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Form\Type\MemberType;
use App\Service\MemberManager;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/api/medlemmar", name="api_members_")
 */
class MemberController extends AbstractController {
    protected MemberManager $memberManager;

    public function __construct(MemberManager $memberManager)
    {
        $this->memberManager = $memberManager;
    }

    /**
     * @Route("/registrera", name="registrera", methods={"POST"})
     */
    public function registrera(Request $request) {
        $data = json_decode($request->getContent(), true);

        $customer = new MemberType();
        $form = $this->createForm(MemberType::class, $customer);
        $form->submit($data);

        if (!$form->isValid()) {
            throw new Exception("Form is invalid.", 0);
        }

        $member = $this->memberManager->create($form->getData());

        return new Response(json_encode([
            "id" => $member->getId(),
            "email" => $member->getEmailAdress(),
            "firstname" => $member->getFörnamn(),
            "surname" => $member->getEfternamn(),
        ]));
    }
}