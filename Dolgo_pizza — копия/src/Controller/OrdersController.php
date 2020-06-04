<?php

namespace App\Controller;

use App\Service\OrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Security;

class OrdersController extends AbstractController
{
    private $service;
    private $security;

    public function __construct(OrderService $service, Security $security)
    {
        $this->service = $service;
        $this->security = $security;
    }

    /**
    * @Route("/orders")
    */
    public function newOrder()
    {
        $pizzaId = $_POST['id'];
        $user = $this->security->getUser();
        $name = $user->getName();
        $address = $user->getAddress();
        $email = $user->getEmail();
        $status = 'Принято';
        $this->service->createOrder($name, $address, $status, $pizzaId, $email);
        return new Response(json_encode(['success' => 1]));          
    }

    /**
    * @Route("/selected")
    */
    public function selectedOrders()
    {
        if ($this->security->isGranted('ROLE_USER'))
        {
            $user = $this->security->getUser();
            $email = $user->getEmail();
            $ids = $this->service->findOrders($email);
            return new Response(json_encode([
                'success' => 1,
                'ids' => $ids
            ]));
        }
        else
        {
            return new Response(json_encode(['success' => 1])); 
        }
        
    }
}
