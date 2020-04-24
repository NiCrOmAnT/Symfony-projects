<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;



class UsersController extends AbstractController
{
    /**
    * @Route("/users")
    */
    public function renderUsers()
    {
        $users = UserRepository::listUsers();        
        return $this->render('pages/users_page.html.twig', ['users' => $users]);
    }
}
