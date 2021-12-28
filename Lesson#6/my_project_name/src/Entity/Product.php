<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="product")
     */
    private $Images;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    public function __construct()
    {
        $this->Images = new ArrayCollection();
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
  

    /**
     * @ORM\Column(type="string", length=255)
     */

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->Images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->Images->contains($image)) {
            $this->Images[] = $image;
            $image->setProduct($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->Images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getProduct() === $this) {
                $image->setProduct(null);
            }
        }

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

   
}
