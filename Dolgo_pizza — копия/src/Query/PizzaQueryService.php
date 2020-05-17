<?php

namespace App\Query;

use App\Entity\Pizza;
use App\Query\PizzaData;
use App\Repository\PizzaRepository;

class PizzaQueryService
{
    private $repository;

    public function __construct(PizzaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function findAll()
    {
        $pizzas = $this->repository->findAll();
        return array_map(static function(Pizza $pizzas): PizzaData 
        {
            $pizzaData = new PizzaData();
            $pizzaData->setId($pizzas->getId());
            $pizzaData->setName($pizzas->getName());
            $pizzaData->setAbout($pizzas->getAbout());
            $pizzaData->setPrice($pizzas->getPrice());
            return $pizzaData;
        }, 
        $pizzas);
    }
}