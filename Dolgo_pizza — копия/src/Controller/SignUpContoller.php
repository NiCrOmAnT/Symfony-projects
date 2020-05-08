<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Service\UserService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SignUpContoller extends AbstractController
{
    /**
     * @Route("/registration")
     */
    public function renderSignUp(request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository(User::class);
        
        $service = new UserService();
        $form = $this->createForm(RegistrationFormType::class);
        $form->handleRequest($request);

        $name = $form->get('name')->getData();
        $email = $form->get('email')->getData();
        $password = $form->get('password')->getData();
        $address = $form->get('address')->getData();

        $newUser = $repository -> findOneBy(['email' => $email]);
    
        if ($form->isSubmitted() && $form->isValid()) 
        {
            if ($newUser === null) 
            {        
                $service -> addUser($name, $email, $password, $address, $entityManager);
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
