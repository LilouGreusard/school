<?php

namespace App\Service;

use App\Entity\Contact;
use Symfony\Component\Mime\Address;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class ContactMailer
{
    public function __construct(
        private MailerInterface $mailer,
        private string $toEmail
    ){}

    public function sendContactMessage(Contact $contact): void
    {
        $email=(new TemplatedEmail())
            ->from(new Address($contact->getEmail()))
            ->to($this->toEmail)
            ->subject('Vous avez reçu un mail')
            ->htmlTemplate('email/contact.html.twig')
            ->context([
                'name'=>$contact->getName(),
                'senderEmail'=>$contact->getEmail(),
                'service'=>$contact->getService(),
                'phoneNumber'=>$contact->getPhoneNumber(),
                'message'=>$contact->getMessage(),
            ]);
            $this->mailer->send($email);
    }
}