<?php

namespace App\Repository;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Entity\Order;

class OrderRepository
{
    public function addOrder($order, $pizza):void
    {
        $fileName = 'orders.json';
        $data = json_decode(file_get_contents($fileName));
        $number = count($data) + 1; 
        $order->setNumber($number);
        $order->setPizza($pizza['name']);
        $order->setPrice($pizza['price']);
        $order->setName('//Имя пользователя');
        $order->setAddress('//Адрес пользователя');
        $order->setStatus('Готовится');

        $orderData = [
            'number' => $order->getNumber(),
            'pizza' => $order->getPizza(),
            'price' => $order->getPrice(),
            'name' => $order->getName(),
            'address' => $order->getAddress(),
            'status' => $order->getStatus()
        ];
        
        
        array_push($data, $orderData);
        file_put_contents($fileName, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}
   