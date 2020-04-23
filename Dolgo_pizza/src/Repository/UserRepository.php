<?php

namespace App\Repository;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Security\User;

class UserRepository
{
    public function addUser($user, $form, $file_name)
    {
        $user->setName($form->get('name')->getData());
        $user->setEmail($form->get('email')->getData());
        $user->setPassword($form->get('password')->getData());
        $user->setAddress($form->get('address')->getData());

        $register_form = [
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'address' => $user->getAddress(),
        ];
        
        $data = json_decode(file_get_contents($file_name));
        array_push($data, $register_form);
        file_put_contents($file_name, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    }
    public function findUser($user, $form, $file_name)
    {   
        $data = json_decode(file_get_contents($file_name));
        $email = $form->get('email')->getData();
        foreach ($data as $user) {
            foreach ($user as $key => $value) {
                if ($key === 'email') 
                {
                    if ($value === $email) {
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
}
