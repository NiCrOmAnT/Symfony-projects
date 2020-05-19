<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Query\UserQueryService;

class UsersController extends AbstractController
{
    private $query;

    public function __construct(UserQueryService $query)
    {
        $this->query = $query;
    }

    /**
    * @Route("/users", name="users")
    */
    public function renderUsers()
    {
        $users = $this->query->findAll();
        return $this->render('pages/users_page.html.twig', ['users' => $users]);
    }
}
