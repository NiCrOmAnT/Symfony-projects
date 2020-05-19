<?php

namespace App\Controller;

use App\Service\OrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class StatusController extends AbstractController
{
    private $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    /**
    * @Route("/status")
    */
    public function newStatus()
    {
        $status = $_POST['selected'];
        $id = $_POST['id'];
        $this->service->newStatus($status, $id);
        return new Response(json_encode(['success' => 1]));          
    }
}