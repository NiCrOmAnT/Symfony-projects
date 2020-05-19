<?php
namespace App\Service;

use App\Entity\Order;
use App\Repository\PizzaRepository;
use App\Repository\OrderRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class OrderService
{
    private $pizzaRepository;
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository, PizzaRepository $pizzaRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->pizzaRepository = $pizzaRepository;
    }

    public function addOrder(string $name, string $address, string $status, string $pizzaId): void
    {
        $order = new Order();
        $pizza = $this->pizzaRepository->find($pizzaId);
        $order->setPizza($pizza->getName());
        $order->setPrice($pizza->getPrice());
        $order->setName($name);
        $order->setAddress($address);
        $order->setStatus($status);
        $this->orderRepository->add($order);
    }
    
    public function newStatus(string $status, int $id): void
    {
        $order = $this->orderRepository->find($id);
        $order->setStatus($status);
        $this->orderRepository->add($order);
    }
}