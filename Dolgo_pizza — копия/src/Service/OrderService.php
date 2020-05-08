<?php
namespace App\Service;

use App\Entity\Order;
use App\Repository\PizzaRepository;
use App\Repository\OrderRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class OrderService
{
    public function addOrder(string $name, string $address, string $status, string $pizzaId, $entityManager, $pizzaRepository): void
    {
        $order = new Order;
        $pizza = $pizzaRepository->find($pizzaId);
        $order->setPizza($pizza->getName());
        $order->setPrice($pizza->getPrice());
        $order->setName('//Имя пользователя');
        $order->setAddress('//Адрес пользователя');
        $order->setStatus('Готовится');
        OrderRepository::add($order, $entityManager);
    }  
}