<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\Pizza;
use App\Service\OrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class OrdersController extends AbstractController
{
    private $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    /**
    * @Route("/orders")
    */
    public function newOrder()
    {
        $pizzaId = $_POST['id'];
        $name = 'Имя пользователя';
        $address = 'Адрес пользователя';
        $status = 'Готовится';
        $this->service->addOrder($name, $address, $status, $pizzaId);
        return new Response(json_encode(['success' => 1]));          
    }
}
