<?php

namespace App\Query;

use App\Repository\UserRepository;
use App\Query\UserData;

class UserQueryService
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function addData(UserData $userData, array $users): void
    {
        $userData = $users;
    }

    public function findAll()
    {
        $userData = new UserData;
        $users = $this->repository->findAll();
        $userData = array_map($this->addData($userData, $users), $users);
        return $userData;
    }
}