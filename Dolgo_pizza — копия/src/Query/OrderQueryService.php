<?php

namespace App\Query;

use App\Repository\OrderRepository;
use App\Query\OrderData;

class OrderQueryService
{
    private $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function findAll()
    {
        $orderData = new OrderData;
        $orders = $this->repository->findAll();
        $orderData = array_map(null, $orders);
        return $orderData;
    }
}