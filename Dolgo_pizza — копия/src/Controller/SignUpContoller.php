<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SignUpContoller extends AbstractController
{
    /**
     * @Route("/registration")
     */
    public function renderSingUp()
    {
        return $this->render('sign_up_page/sign_up_page.html.twig', [
            'controller_name' => 'SingUpContoller',
        ]);
    }
}
