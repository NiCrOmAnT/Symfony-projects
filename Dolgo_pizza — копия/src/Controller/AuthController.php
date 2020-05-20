<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends AbstractController
{
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
    * @Route("/auth", name="auth")
    */
    public function Auth(Request $request)
    {
        $email = $_POST['_username'];
        $password = $_POST['_password'];
        $currentUser = $this->repository->findOneBy(['email' => $email]);
        if ($currentUser === null)
        {
            return new Response(json_encode(['success' => false]));
        }
        else
        {
            return new Response(json_encode(['success' => true]));
        }
    }
}
