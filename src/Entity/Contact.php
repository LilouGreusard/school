<?php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
    #[Assert\NotBlank(message: "Le prènom est obligatoire.")]
    #[Assert\Length(
        min: 2, 
        max: 50, 
        minMessage: "Le prènom doit contenir au moins {{ limit }} caractères.",
        maxMessage: "Le prènom doit contenir au maximum {{ limit }} caractères."
    )]
    #[Assert\Regex(
        pattern: '/^[\p{L}\p{M}\-\'\s]+$/u',
        message:"Le prénom contient des caractères invalides.",
    )]
    private string $name;

    #[Assert\NotBlank(message: "L'email est obligatoire.")]
    #[Assert\Email(
        message: "L'adresse email est invalide.")]
    private string $email;

    private string $service = '';

    #[Assert\NotBlank(message: "Le numéro de téléphonne est obligatoire.")]
    #[Assert\Regex(
        pattern: '/^\+?[0-9\s\-\(\)\.]{7,20}$/',
        message: "Le numéro de téléphonne est invalide.")]
    private string $phoneNumber;

    #[Assert\NotBlank(message: "Le message est obligatoire.")]
    #[Assert\Length(
        min: 10, 
        max: 1000, 
        minMessage: "Le message doit contenir au moins {{ limit }} caractères.",
        maxMessage: "Le message doit contenir au maximum {{ limit }} caractères.")]
    #[Assert\Regex(
        pattern: '/^[^<>]+$/',
        message: "A MORT LES SPAAAAMS"
    )]
    private string $message;

    // Getters & Setters

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getService(): string
    {
        return $this->service;
    }

    public function setService(string $service): self
    {
        $this->service = $service;
        return $this;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }
}