<?php

namespace App\Controller;

use App\Exception\InvalidEmailException;
use App\Exception\InvalidNameException;
use App\Exception\InvalidPasswordException;
use App\Exception\UserAlreadyExistsException;
use App\Form\RegistrationFormType;
use App\Service\UserService;
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
            try
            {
                $this->service->addUser($name, $email, $password, $address);
                $this->service->addAdmin('Админ');
                $this->addFlash('success', 'Вы успешно зарегистрированы!');
                return $this->redirectToRoute("home");
            }
            catch(UserAlreadyExistsException $e)
            {
                $this->addFlash('warning', 'Пользователь с такой почтой уже существует.');
                return $this->redirectToRoute("login", [
                    'last_email' => $email
                ]);
            }
            catch(InvalidPasswordException $e)
            {
                $this->addFlash('warning', 'Слишком короткий пароль.');
            }
            catch(InvalidNameException $e)
            {
                $this->addFlash('warning', 'Имя должно содержать только буквы');
            }
            catch(InvalidEmailException $e)
            {
                $this->addFlash('warning', 'Почта указана не корректно');
            }
                
        } 

        return $this->render('sign_up_page/sign_up_page.html.twig', 
        [
            'registrationForm' => $form->createView(),
        ]);
    }
}
