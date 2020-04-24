<?php

namespace App\Repository;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Entity\Pizza;

class PizzaRepository
{
    private const pizzaFile = 'data/pizzas.json';
    
    public function addPizza($order, $pizza):void
    {
        $pizzas = json_decode(file_get_contents(self::pizzaFile));
        $number = count($pizzas) + 1; 
        $order->setNumber($number);
        $order->setName();
        $order->setAbout();
        $order->setPrice();


        $orderData = 
        [
            'number' => $order->getNumber(),
            'name' => $order->getName(),
            'about' => $order->getAbout(),
            'price' => $order->getPrice(),
        ];
        
        
        array_push($pizzas, $orderData);
        file_put_contents(self::pizzaFile, json_encode($pizzas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    public function listPizza()
    {
        $pizzas = json_decode(file_get_contents(self::pizzaFile));
        return $pizzas;
    }
}
   