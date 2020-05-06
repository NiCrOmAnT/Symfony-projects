<?php
namespace App\Service;

use App\Entity\Order;

class OrderService
{
    public function addOrder($order, $pizza): void
    {
        $order->setPizza($pizza->getName());
        $order->setPrice($pizza->getPrice());
        $order->setName('//Имя пользователя');
        $order->setAddress('//Адрес пользователя');
        $order->setStatus('Готовится');
    }  
}