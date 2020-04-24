<?php

namespace App\Controller;

use App\Security\UserSecurity;
use App\Entity\User;
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
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) 
        {
            if (!UserRepository::findUser($user, $form)) 
            {        
                // return $this->redirect("/", 308);
                $user = UserRepository::addUser($user, $form);
                $this->addFlash('success', 'Вы успешно зарегистрированы!');
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
