<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Form\Type\MemberType;
use App\Service\MemberManager;
use Exception;
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
     * @Route("", name="post", methods={"POST"})
     */
    public function post(Request $request) {
        $data = json_decode($request->getContent(), true);

        $customer = new MemberType();
        $form = $this->createForm(MemberType::class, $customer);
        $form->submit($data);

        if (!$form->isValid()) {
            throw new Exception("Form is invalid.", 0);
        }

        $this->memberManager->create($form->getData());

        return new Response(json_encode($customer));
    }
}