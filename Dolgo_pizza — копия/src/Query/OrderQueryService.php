<?php

namespace App\Query;

use App\Repository\OrderRepository;
use App\Query\OrderData;
use App\Entity\Order;

class OrderQueryService
{
    private $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function findAll()
    {
        $orders = $this->repository->findAll();
        return array_map(static function(Order $order): OrderData 
        {
            $orderData = new OrderData();
            $orderData->setId($order->getId());
            $orderData->setPizza($order->getPizza());
            $orderData->setPrice($order->getPrice());
            $orderData->setName($order->getName());
            $orderData->setAddress($order->getAddress());
            $orderData->setStatus($order->getStatus());
            return $orderData;
        }, 
        $orders);
    }
}