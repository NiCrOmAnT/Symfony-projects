<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\OrderRepository;
use App\Repository\PizzaRepository;
use App\Entity\Pizza;
use App\Entity\Order;

class HomeController extends AbstractController
{
    /**
    * @Route()
    */
    public function renderMainPage()
    {
        $orderRepository = $this->getDoctrine()->getRepository(Order::class);
        $pizzaRepository = $this->getDoctrine()->getRepository(Pizza::class);
        $orders = $orderRepository->findAll();
        $pizzas = $pizzaRepository->findAll();
        return $this->render('home_page/menu.html.twig', 
        [
            'pizzas' => $pizzas,
            'orders' => $orders
        ]);
    }
}
