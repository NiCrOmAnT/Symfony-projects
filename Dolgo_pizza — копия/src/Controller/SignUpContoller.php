<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Service\UserService;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class SignUpContoller extends AbstractController
{
    
    
    private $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

     /**
     * @Route("/registration")
     */
    public function renderSignUp(request $request)
    {
        $form = $this->createForm(RegistrationFormType::class);
        $form->handleRequest($request);

        $name = $form->get('name')->getData();
        $email = $form->get('email')->getData();
        $password = $form->get('password')->getData();
        $address = $form->get('address')->getData();
        
    
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $isExist = $this->service->addUser($name, $email, $password, $address);
            if (!$isExist)
            {        
                
                $this->addFlash('success', 'Вы успешно зарегистрированы!');
                return $this->redirect("/", 308);
            }
            else
            {
                $this->addFlash('warning', 'Пользователь с такой почтой уже существует.');
            }
        } 

        return $this->render('sign_up_page/sign_up_page.html.twig', 
        [
            'registrationForm' => $form->createView(),
        ]);     
    }
}
