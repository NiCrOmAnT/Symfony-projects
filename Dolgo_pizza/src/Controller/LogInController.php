<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LogInController extends AbstractController
{
    /**
    * @Route("/login")
    */
    public function renderLogIn()
    {
        return $this->render('login_page/login_page.html.twig', [
            'controller_name' => 'LogInController',
        ]);
    }
}
