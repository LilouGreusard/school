<?php

namespace App\Entity;

use App\Entity\Trait\DateTrait;
use App\Repository\PaymentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaymentRepository::class)]
class Payment
{
    use DateTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $totalPaid = null;

    #[ORM\Column(length: 255)]
    private ?string $stripeCheckout = null;

    #[ORM\ManyToOne(inversedBy: 'payement')]
    private ?Order $orders = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTotalPaid(): ?string
    {
        return $this->totalPaid;
    }

    public function setTotalPaid(string $totalPaid): static
    {
        $this->totalPaid = $totalPaid;

        return $this;
    }

    public function getStripeCheckout(): ?string
    {
        return $this->stripeCheckout;
    }

    public function setStripeCheckout(string $stripeCheckout): static
    {
        $this->stripeCheckout = $stripeCheckout;

        return $this;
    }

    public function getOrders(): ?Order
    {
        return $this->orders;
    }

    public function setOrders(?Order $orders): static
    {
        $this->orders = $orders;

        return $this;
    }
}
