<?php

namespace App\Form;

use App\Security\UserSecurity;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => false, 
                'attr' => array(
                    'class' => 'field',
                    'placeholder' => 'ФИО')])
            ->add('email', EmailType::class, [
                'label' => false,
                'attr' => array(
                    'class' => 'field',
                    'placeholder' => 'Почта',
                    'type' => 'email')])
            ->add('password', PasswordType::class, [
                'label' => false, 
                'attr' => array(
                    'class' => 'field', 
                    'placeholder' => 'Пароль'), 
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Пожалуйста, введите пароль',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Пароль должен быть не меньше {{ limit }} символов',
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('address', TextType::class, [
                'label' => false, 
                'attr' => array(
                    'class' => 'field',
                    'placeholder' => 'Адресс доставки')])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
