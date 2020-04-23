<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;



class UsersController extends AbstractController
{
    /**
    * @Route("/users")
    */
    public function renderUsers()
    {
        $file_name = 'data.json';
        $users = json_decode(file_get_contents($file_name), JSON_OBJECT_AS_ARRAY);
        
        return $this->render('pages/users_page.html.twig', array('users' => $users));
    }
}
