<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FoodOrdersRepository")
 */
class FoodOrders
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date;

    /**
     * @ORM\Column(type="integer")
     */
    private $Persons;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $Price;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Booking", inversedBy="foodOrders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Booking_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Customers", inversedBy="foodOrders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Customer_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Restaurant", inversedBy="foodOrders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Restaurant_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getPersons(): ?int
    {
        return $this->Persons;
    }

    public function setPersons(int $Persons): self
    {
        $this->Persons = $Persons;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->Price;
    }

    public function setPrice(string $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    public function getBookingId(): ?Booking
    {
        return $this->Booking_id;
    }

    public function setBookingId(?Booking $Booking_id): self
    {
        $this->Booking_id = $Booking_id;

        return $this;
    }

    public function getCustomerId(): ?Customers
    {
        return $this->Customer_id;
    }

    public function setCustomerId(?Customers $Customer_id): self
    {
        $this->Customer_id = $Customer_id;

        return $this;
    }

    public function getRestaurantId(): ?Restaurant
    {
        return $this->Restaurant_id;
    }

    public function setRestaurantId(?Restaurant $Restaurant_id): self
    {
        $this->Restaurant_id = $Restaurant_id;

        return $this;
    }
}
