<?php

namespace App\Entity;

use App\Entity\Trait\DateTrait;
use App\Repository\ShopRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShopRepository::class)]
class Shop
{
    use DateTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $productName = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $priceProduct = null;

    #[ORM\Column(length: 255)]
    private ?string $picture = null;

    #[ORM\Column(length: 255)]
    private ?string $smallDescProduct = null;

    #[ORM\Column(length: 255)]
    private ?string $highDescProduct = null;

    #[ORM\Column(length: 255)]
    private ?string $stock = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $discountPercent = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $discountNumeric = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Categories $category = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName(): ?string
    {
        return $this->productName;
    }

    public function setProductName(string $productName): static
    {
        $this->productName = $productName;

        return $this;
    }

    public function getPriceProduct(): ?string
    {
        return $this->priceProduct;
    }

    public function setPriceProduct(string $priceProduct): static
    {
        $this->priceProduct = $priceProduct;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }

    public function getSmallDescProduct(): ?string
    {
        return $this->smallDescProduct;
    }

    public function setSmallDescProduct(string $smallDescProduct): static
    {
        $this->smallDescProduct = $smallDescProduct;

        return $this;
    }

    public function getHighDescProduct(): ?string
    {
        return $this->highDescProduct;
    }

    public function setHighDescProduct(string $highDescProduct): static
    {
        $this->highDescProduct = $highDescProduct;

        return $this;
    }

    public function getStock(): ?string
    {
        return $this->stock;
    }

    public function setStock(string $stock): static
    {
        $this->stock = $stock;

        return $this;
    }

    public function getDiscountPercent(): ?string
    {
        return $this->discountPercent;
    }

    public function setDiscountPercent(?string $discountPercent): static
    {
        $this->discountPercent = $discountPercent;

        return $this;
    }

    public function getDiscountNumeric(): ?string
    {
        return $this->discountNumeric;
    }

    public function setDiscountNumeric(?string $discountNumeric): static
    {
        $this->discountNumeric = $discountNumeric;

        return $this;
    }

    public function getCategory(): ?Categories
    {
        return $this->category;
    }

    public function setCategory(?Categories $category): static
    {
        $this->category = $category;

        return $this;
    }
}
