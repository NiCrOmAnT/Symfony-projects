<?php

namespace App\Repository;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Entity\Order;

class OrderRepository
{
    private const ordersFile = 'data/orders.json';

    public function addOrder($order, $pizza): void
    {
        $orders = json_decode(file_get_contents(self::ordersFile));
        $number = count($orders) + 1; 
        $order->setNumber($number);
        $order->setPizza($pizza['name']);
        $order->setPrice($pizza['price']);
        $order->setName('//Имя пользователя');
        $order->setAddress('//Адрес пользователя');
        $order->setStatus('Готовится');

        $orderData = 
        [
            'number' => $order->getNumber(),
            'pizza' => $order->getPizza(),
            'price' => $order->getPrice(),
            'name' => $order->getName(),
            'address' => $order->getAddress(),
            'status' => $order->getStatus()
        ];
        
        
        array_push($orders, $orderData);
        file_put_contents(self::ordersFile, json_encode($orders, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    public function listOrders()
    {
        $orders = json_decode(file_get_contents(self::ordersFile));
        return $orders;
    }
}
   