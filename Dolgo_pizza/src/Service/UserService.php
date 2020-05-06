<?php
namespace App\Service;

use App\Entity\User;

class UserService
{
    public function addUser($user, $form): void
    {
        $user->setName($form->get('name')->getData());
        $user->setEmail($form->get('email')->getData());
        $user->setPassword($form->get('password')->getData());
        $user->setAddress($form->get('address')->getData());
    }
  
}