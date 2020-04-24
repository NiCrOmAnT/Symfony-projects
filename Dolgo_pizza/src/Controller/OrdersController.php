<?php

namespace App\Controller;

use App\Entity\Order;
use App\Repository\OrderRepository;
use App\Repository\PizzaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class OrdersController extends AbstractController
{
    /**
    * @Route("/orders")
    */
    public function addOrder()
    {
        $order = new Order;
        $pizzas = PizzaRepository::listPizza();
        $id = $_POST['id'];
        $pizza = (array)$pizzas[$id-1];
        $order = OrderRepository::addOrder($order, $pizza);

        return new Response(json_encode(['success'=>1]));          
    }
}
