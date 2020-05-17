<?php
namespace App\Service;

use App\Entity\User;
use App\Exception\InvalidEmailException;
use App\Exception\InvalidNameException;
use App\Exception\InvalidPasswordException;
use App\Exception\UserAlreadyExistsException;
use App\Repository\UserRepository;

class UserService
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function addUser(string $name, string $email, string $password, string $address): void
    {
        $existedUser = $this->repository->findOneBy(['email' => $email]);
        if ($existedUser !== null)
        {
            throw new UserAlreadyExistsException();
        } 
        if (strlen($password) < 6)
        {
            throw new InvalidPasswordException();
        }
        if (!preg_match("/^[а-я ё А-Я Ё a-z A-Z ]+$/u", $name))
        {
            throw new InvalidNameException();
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            throw new InvalidEmailException();
        }

        $user = new User();
        $user->setName($name);
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setAddress($address);
        $this->repository->add($user);    
    }
}