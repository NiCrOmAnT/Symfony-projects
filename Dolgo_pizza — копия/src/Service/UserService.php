<?php
namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;

class UserService
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
    public function addUser(string $name, string $email, string $password, string $address): bool
    {
        $newUser = $this->repository->findOneBy(['email' => $email]);
        if (True)
        {
            $isExist = false;
            $user = new User;
            $user->setName($name);
            $user->setEmail($email);
            $user->setPassword($password);
            $user->setAddress($address);
            $this->repository->add($user);    
        } 
        else
        {
            $isExist = true;    
        }
        return $isExist; 
    }
}