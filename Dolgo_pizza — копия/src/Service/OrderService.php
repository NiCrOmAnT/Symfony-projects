<?php
namespace App\Service;

use App\Entity\Order;
use App\Entity\User;
use App\Repository\PizzaRepository;
use App\Repository\OrderRepository;

class OrderService
{
    private $pizzaRepository;
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository, PizzaRepository $pizzaRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->pizzaRepository = $pizzaRepository;
    }

    public function createOrder(string $name, string $address, string $status, string $pizzaId, string $email): void
    {
        $order = new Order();
        $pizza = $this->pizzaRepository->find($pizzaId);
        $order->setPizza($pizza->getName());
        $order->setPrice($pizza->getPrice());
        $order->setName($name);
        $order->setAddress($address);
        $order->setStatus($status);
        $order->setEmail($email);
        $this->orderRepository->add($order);
    }
    
    public function updateStatus(string $status, int $id): void
    {
        $order = $this->orderRepository->find($id);
        $order->setStatus($status);
        $this->orderRepository->add($order);
    }

    public function findOrders(string $email) 
    {
        $orders = $this->orderRepository->findAll();
        foreach ($orders as $key => $value) {
            if ($email === $value->getEmail()) {
                $id_orders[$value->getId()] = true;
            }
        }
        return $id_orders;
    }
}