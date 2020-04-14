<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SingUpContoller extends AbstractController
{
    /**
     * @Route("/registration")
     */
    public function renderSingUp()
    {
        return $this->render('sing_up_page/sing_up_page.html.twig', [
            'controller_name' => 'SingUpContoller',
        ]);
    }
}
