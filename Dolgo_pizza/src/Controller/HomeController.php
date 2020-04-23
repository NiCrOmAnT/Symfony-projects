<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
    * @Route()
    */
    public function renderMainPage()
    {
        $file_name = 'pizzas.json';
        $pizzas = json_decode(file_get_contents($file_name));
        return $this->render('home_page/menu.html.twig', array('pizzas' => $pizzas));
    }
}
