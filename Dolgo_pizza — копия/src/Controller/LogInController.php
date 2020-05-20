<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LogInController extends AbstractController
{
    /**
    * @Route("/login2", name="login")
    */
    public function renderLogIn(Request $request, AuthenticationUtils $utils)
    {
        $lastEmail = $utils->getLastUsername(); 
        return $this->render('login_page/login_page.html.twig', [
            'last_email' => $lastEmail
        ]);
    }
}
