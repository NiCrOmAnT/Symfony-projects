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

    public function addData(OrderData $orderData, array $orders): void
    {
        $orderData = $orders;
    }

    public function findAll()
    {
        $orderData = new OrderData();
        $orders = $this->repository->findAll();
        $orderData = array_map($this->addData($orderData, $orders), $orders);
        return $orderData;
    }
}