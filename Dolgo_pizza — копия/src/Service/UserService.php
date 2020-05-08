<?php
namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;

class UserService
{
    public function addUser(string $name, string $email, string $password, string $address, $entityManager): void
    {
        $user = new User;
        $user->setName($name);
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setAddress($address);
        UserRepository::add($user);
    }
}