<?php

namespace App\Repository;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Security\UserSecurity;
use App\Entity\User;

class UserRepository
{
    private const userDataFile = 'data/data.json';

    public function addUser($user, $form): void
    {
        $user->setName($form->get('name')->getData());
        $user->setEmail($form->get('email')->getData());
        $user->setPassword($form->get('password')->getData());
        $user->setAddress($form->get('address')->getData());

        $register_form = 
        [
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'address' => $user->getAddress(),
        ];
        
        $data = json_decode(file_get_contents(self::userDataFile));
        array_push($data, $register_form);
        file_put_contents(self::userDataFile, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    }

    public function findUser($user, $form)
    {   
        $data = json_decode(file_get_contents(self::userDataFile));
        $email = $form->get('email')->getData();
        foreach ($data as $user) {
            foreach ($user as $key => $value) 
            {
                if ($key === 'email') 
                {
                    if ($value === $email) 
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }   
                }
            }
        }
    }

    public function listUsers()
    {
        $users = json_decode(file_get_contents(self::userDataFile), JSON_OBJECT_AS_ARRAY);
        return $users;
    }
}
