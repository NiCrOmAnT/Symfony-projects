<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Service\UserService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class SignUpContoller extends AbstractController
{
    /**
     * @Route("/registration")
     */
    public function renderSignUp(request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository(User::class);
        $user = new User(); 
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);
        $email = $form->get('email')->getData();
        $newUser = $repository -> findOneBy(['email' => $email]);
    
        if ($form->isSubmitted() && $form->isValid()) 
        {
            if ($newUser === null) 
            {        
                UserService::addUser($user, $form);
                $entityManager->persist($user);
                $entityManager->flush();
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
