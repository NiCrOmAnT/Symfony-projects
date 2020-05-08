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
    /**
    * @Route("/orders")
    */
    public function newOrder()
    {
        $pizzaId = $_POST['id'];
        $entityManager = $this->getDoctrine()->getManager();
        $name = 'Имя пользователя';
        $address = 'Адрес пользователя';
        $status = 'Готовится';
        $pizzaRepository = $this->getDoctrine()->getRepository(Pizza::class);
        OrderService::addOrder($name, $address, $status, $pizzaId, $entityManager, $pizzaRepository);
        return new Response(json_encode(['success' => 1]));          
    }
}
