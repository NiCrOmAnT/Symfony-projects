<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Query\OrderQueryService;
use App\Query\PizzaQueryService;

class HomeController extends AbstractController
{
    private $pizzaQuery;
    private $orderQuery;

    public function __construct(PizzaQueryService $pizzaQuery, OrderQueryService $orderQuery)
    {
        $this->pizzaQuery = $pizzaQuery;
        $this->orderQuery = $orderQuery;
    }

    /**
    * @Route(name="home")
    */
    public function renderMainPage()
    {
        $orders = $this->orderQuery->findAll();
        $pizzas = $this->pizzaQuery->findAll();
        return $this->render('home_page/menu.html.twig', 
        [
            'pizzas' => $pizzas,
            'orders' => $orders
        ]);
    }
}
