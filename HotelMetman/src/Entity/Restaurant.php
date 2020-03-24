<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RestaurantRepository")
 */
class Restaurant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FoodOrders", mappedBy="Restaurant_id")
     */
    private $foodOrders;

    public function __construct()
    {
        $this->foodOrders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return Collection|FoodOrders[]
     */
    public function getFoodOrders(): Collection
    {
        return $this->foodOrders;
    }

    public function addFoodOrder(FoodOrders $foodOrder): self
    {
        if (!$this->foodOrders->contains($foodOrder)) {
            $this->foodOrders[] = $foodOrder;
            $foodOrder->setRestaurantId($this);
        }

        return $this;
    }

    public function removeFoodOrder(FoodOrders $foodOrder): self
    {
        if ($this->foodOrders->contains($foodOrder)) {
            $this->foodOrders->removeElement($foodOrder);
            // set the owning side to null (unless already changed)
            if ($foodOrder->getRestaurantId() === $this) {
                $foodOrder->setRestaurantId(null);
            }
        }

        return $this;
    }
}
