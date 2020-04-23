<?php

namespace App\Controller;

use App\Security\User;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SignUpContoller extends AbstractController
{
    /**
     * @Route("/registration")
     */
    public function renderSignUp(request $request)
    {
        $user = new User(); 
        $form = $this->createForm(RegistrationFormType::class, $user);
        $file_name = 'data.json';
        $form->handleRequest($request);
        

        if ($form->isSubmitted() && $form->isValid()) {
            if (!UserRepository::findUser($user, $form, $file_name)) 
            {        
                // return $this->redirect("/", 308);
                $user = UserRepository::addUser($user, $form, $file_name);
                $this->addFlash('success', 'Вы успешно зарегистрированы!');
            }
            else
            {
                $this->addFlash('warning', 'Пользователь с такой почтой уже существует.');
            }
        } 

        return $this->render('sign_up_page/sign_up_page.html.twig', [
            'registrationForm' => $form->createView(),
        ]);     
    }
}
