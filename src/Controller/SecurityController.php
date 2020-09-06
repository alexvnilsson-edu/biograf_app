<?php

namespace App\Controller;

use App\Form\Type\UserType;
use App\Service\MemberManager;
use Exception;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    protected MemberManager $memberManager;
    protected JWTEncoderInterface $jwtEncoder;
    protected AuthenticationUtils $authenticationUtils;

    public function __construct(MemberManager $memberManager, JWTEncoderInterface $jwtEncoder, AuthenticationUtils $authenticationUtils)
    {
        $this->memberManager = $memberManager;
        $this->jwtEncoder = $jwtEncoder;
        $this->authenticationUtils = $authenticationUtils;
    }

    /**
     * @Route("/login", name="security_login", methods={"GET", "POST"})
     */
    public function login()
    {
        $error = $this->authenticationUtils->getLastAuthenticationError();

        $lastUsername = $this->authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    /**
     * @Route("/login_check", name="security_login_check", methods={"POST", "GET"})
     */
    public function login_check(Request $request)
    {
    }

    /**
     * @Route("/logout", name="security_logout", methods={"GET"})
     */
    public function logout()
    {
    }

    /**
     * @Route("/register", name="security_register", methods={"GET", "POST"})
     */
    public function register(Request $request)
    {
        $user = new UserType();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            $user = $this->memberManager->create($form->getData());
        }

        return $this->render('security/register.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
