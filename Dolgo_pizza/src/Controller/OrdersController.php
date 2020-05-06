<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\Pizza;
use App\Service\OrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class OrdersController extends AbstractController
{
    /**
    * @Route("/orders")
    */
    public function newOrder()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $pizzaRepository = $this->getDoctrine()->getRepository(Pizza::class);
        $order = new Order;
        $id = $_POST['id'];
        $pizza = $pizzaRepository->find($id);
        OrderService::addOrder($order, $pizza);
        $entityManager->persist($order);
        $entityManager->flush();

        return new Response(json_encode(['success' => 1]));          
    }
}
