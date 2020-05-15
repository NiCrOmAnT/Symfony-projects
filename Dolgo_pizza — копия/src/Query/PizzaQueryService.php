<?php

namespace App\Query;

use App\Query\PizzaData;
use App\Repository\PizzaRepository;

class PizzaQueryService
{
    private $repository;

    public function __construct(PizzaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function addData(PizzaData $pizzaData, array $pizzas):void
    {
        $pizzaData = $pizzas;
    }

    public function findAll()
    {
        $pizzaData = new PizzaData();
        $pizzas = $this->repository->findAll();
        $pizzaData = array_map($this->addData($pizzaData, $pizzas), $pizzas);
        return $pizzaData;
    }
}