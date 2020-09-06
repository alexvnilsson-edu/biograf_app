<?php

namespace App\Controller;

use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    protected JWTEncoderInterface $jwtEncoder;
    protected AuthenticationUtils $authenticationUtils;

    public function __construct(JWTEncoderInterface $jwtEncoder, AuthenticationUtils $authenticationUtils)
    {
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
}
