<?php

namespace App\Controller;

use App\Form\Type\MemberAuthenticationType;
use App\Security\TokenAuthenticator;
use App\Service\MemberManager;
use Exception;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController {
    protected MemberManager $memberManager;
    protected JWTEncoderInterface $jwtEncoder;
    protected AuthenticationUtils $authenticationUtils;
    #protected CsrfTokenManagerInterface $csrfTokenManager;

    public function __construct(MemberManager $memberManager, JWTEncoderInterface $jwtEncoder, AuthenticationUtils $authenticationUtils)
    {
        $this->memberManager = $memberManager;
        $this->jwtEncoder = $jwtEncoder;
        $this->authenticationUtils = $authenticationUtils;
        #$this->csrfTokenManager = $csrfTokenManager;
    }

    /**
     * @Route("/login", name="security_login", methods={"GET", "POST"})
     */
    public function login() {
        // $data = json_decode($request->getContent(), true);

        // $credentials = new MemberAuthenticationType();
        // $form = $this->createForm(MemberAuthenticationType::class, $credentials);
        // $form->submit($data);

        // if (!$form->isValid()) {
        //     throw new Exception("Formuläret innehåller felaktig data.", 1, new Exception($form->getErrors(false, true)));
        // }

        // // if (!$this->isCsrfTokenValid(MemberManager::$CSRF_TOKEN_NAME, $credentials->csrf_token)) {
        // //     throw new InvalidCsrfTokenException();
        // // }

        // try {
        //     $member = $this->memberManager->authenticate($credentials);
        // } catch (Exception $e) {
        //     throw new Exception("Felaktigt användarnamn eller lösenord.", 1, $e);
        // }

        // $tokenData = [
        //     "username" => $member->getUsername(),
        //     "exp" => time() + (3600 * 12)
        // ];

        // $token = $this->jwtEncoder
        //     ->encode($tokenData);

        // $request->getSession()->set(
        //     Security::LAST_USERNAME,
        //     $member->getEmailAdress()
        // );

        // return $guardHandler->authenticateUserAndHandleSuccess(
        //     $member,
        //     $request,
        //     $authenticator,
        //     "main"
        // );

        // // return new JsonResponse([
        // //     "success" => true,
        // //     "payload" => ["token" => $token, "exp" => $tokenData["exp"]]
        // // ]);

        $error = $this->authenticationUtils->getLastAuthenticationError();
        
        $lastUsername = $this->authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

    /**
     * @Route("/login_check", name="authentication_login_check", methods={"POST", "GET"})
     */
    public function login_check(Request $request) {

    }
}