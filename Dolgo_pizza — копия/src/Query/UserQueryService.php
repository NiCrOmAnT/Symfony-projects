<?php

namespace App\Query;

use App\Repository\UserRepository;
use App\Query\UserData;
use App\Entity\User;

class UserQueryService
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function findAll()
    {
        $users = $this->repository->findAll();
        return array_map(static function(User $users): UserData 
        {
            $userData = new UserData();
            $userData->setId($users->getId());
            $userData->setName($users->getName());
            $userData->setEmail($users->getEmail());
            $userData->setPassword($users->getPassword());
            $userData->setAddress($users->getAddress());
            return $userData;
        },
        $users);
    }
}