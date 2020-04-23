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
        $pizzasFile = 'pizzas.json';
        $ordersFile = 'orders.json';
        $pizzas = json_decode(file_get_contents($pizzasFile));
        $orders = json_decode(file_get_contents($ordersFile));
        return $this->render('home_page/menu.html.twig', [
            'pizzas' => $pizzas,
            'orders' => $orders
        ]);
    }
}
