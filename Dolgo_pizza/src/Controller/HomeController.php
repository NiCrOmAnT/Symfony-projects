<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\OrderRepository;
use App\Repository\PizzaRepository;

class HomeController extends AbstractController
{
    /**
    * @Route()
    */
    public function renderMainPage()
    {
        $pizzas = PizzaRepository::listPizza();
        $orders = OrderRepository::listOrders();
        return $this->render('home_page/menu.html.twig', 
        [
            'pizzas' => $pizzas,
            'orders' => $orders
        ]);
    }
}
