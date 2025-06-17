<?php

namespace App\Entity;

use App\Entity\Trait\DateTrait;
use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    use DateTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $pictures = null;

    /**
     * @var Collection<int, Payment>
     */
    #[ORM\OneToMany(targetEntity: Payment::class, mappedBy: 'orders')]
    private Collection $payement;

    public function __construct()
    {
        $this->payement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPictures(): ?string
    {
        return $this->pictures;
    }

    public function setPictures(string $pictures): static
    {
        $this->pictures = $pictures;

        return $this;
    }

    /**
     * @return Collection<int, Payment>
     */
    public function getPayement(): Collection
    {
        return $this->payement;
    }

    public function addPayement(Payment $payement): static
    {
        if (!$this->payement->contains($payement)) {
            $this->payement->add($payement);
            $payement->setOrders($this);
        }

        return $this;
    }

    public function removePayement(Payment $payement): static
    {
        if ($this->payement->removeElement($payement)) {
            // set the owning side to null (unless already changed)
            if ($payement->getOrders() === $this) {
                $payement->setOrders(null);
            }
        }

        return $this;
    }
}
