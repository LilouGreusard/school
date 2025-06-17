<?php

namespace App\Entity;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Karser\Recaptcha3Bundle\Form\Recaptcha3Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Karser\Recaptcha3Bundle\Validator\Constraints\Recaptcha3;

class ContactForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,[
                'attr'=>[
                    'placeholder'=>'Enter your name.'
                ]
            ])

            ->add('email', EmailType::class,[
                'attr'=>[
                    'placeholder'=>'Enter your email.'
                ]
            ])

            ->add('service', TextType::class,[
                'attr'=>[
                    'placeholder'=>'Enter service.'
                ]
            ])

            ->add('phoneNumber', TelType::class,[
                'attr'=>[
                    'placeholder'=>'Enter your phone number.'
                ]
            ])

            ->add('message', TextareaType::class,[
                'attr'=>[
                    'placeholder'=>'Enter your message.'
                ]
            ])
            -> add('Z1K1b35ZK2QnZR9w', HiddenType::class,[
                'mapped'=>FALSE,
                'required'=>FALSE,
                'attr'=>[
                    'autocomplete'=>'off',
                    'tabindex'=>-1,
                ]
            ])
            ->add('submit', SubmitType::class)
            ->add('captcha', Recaptcha3Type::class, [
            'constraints' => new Recaptcha3(),
            'action_name' => 'homepage',
        ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'=>Contact::class,
        ]);
    }
}