<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;

class RegistrationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder


    // changements

            ->add('email', EmailType::class,[
                'attr'=>['class'=>'common__login__input']
            ])
            ->add('firstName', TextType::class,[
                'attr'=>['class'=>'common__login__input']
            ])
            ->add('lastName', TextType::class,[
                'attr'=>['class'=>'common__login__input']
            ])
            ->add('userName', TextType::class,[
                'attr'=>['class'=>'common__login__input']
            ])

            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'attr'=>['class'=>'common__login__input'],
    
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type'=>PasswordType::class,
                'mapped' => false,
                'invalid_message'=>'Les deux mots de passes doivent être identiques',
                'first_options'=>[
                    'label'=>false,
                    'attr'=>[
                        'autocomplete'=>'new-password',
                        'class'=>'common__login__input',
                        'placeholder'=>'Entrez le mot de passe'
                    ],
                    'toggle'=>true,
                    
                ],
                'second_options'=>[
                    'label'=>false,
                    'attr'=>[
                        'autocomplete'=>'new-password',
                        'class'=>'common__login__input',
                        'placeholder'=>'Re-Entrez le mot de passe'
                    ],
                    'toggle'=>true,
                    
                ],
    // fin changements
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
    // changements
                    new Regex([
                        'pattern' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/',
                        'message' => 'Your password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
                    ]),
    // fin changements
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
