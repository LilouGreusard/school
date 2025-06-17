<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\ContactForm;
use App\Service\ContactMailer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

final class ContactController extends AbstractController
{
    public function __construct(
        private ContactMailer $contactMailer
    ) {}

    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request) : Response
    {

        $contact=new Contact();
        $form=$this->createForm(ContactForm::class,$contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            if (!empty($form->get('Z1K1b35ZK2QnZR9w')->getData())){
                return $this->redirectToRoute('app_contact');
            }

            $this->contactMailer->sendContactMessage($contact);
            $this->addFlash('success', 'Votre message a été envoyé avec succés.');
            return $this->redirectToRoute('app_contact');
        }
    

        return $this->render('contact/index.html.twig', [
            'form'=>$form->createView(),   
        ]);
    }
}
