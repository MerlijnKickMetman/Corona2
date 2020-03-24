<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookingRepository")
 */
class Booking
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
    private $Duration;

    /**
     * @ORM\Column(type="integer")
     */
    private $Num_of_guests;

    /**
     * @ORM\Column(type="date")
     */
    private $Start_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Comments;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $Total_price;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Is_paid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Payment_type;

    /**
     * @ORM\Column(type="date")
     */
    private $Payment_date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Customers", inversedBy="bookings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Customer_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Rooms", inversedBy="bookings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Room_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FoodOrders", mappedBy="Booking_id")
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

    public function getDuration(): ?\DateTimeInterface
    {
        return $this->Duration;
    }

    public function setDuration(\DateTimeInterface $Duration): self
    {
        $this->Duration = $Duration;

        return $this;
    }

    public function getNumOfGuests(): ?int
    {
        return $this->Num_of_guests;
    }

    public function setNumOfGuests(int $Num_of_guests): self
    {
        $this->Num_of_guests = $Num_of_guests;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->Start_date;
    }

    public function setStartDate(\DateTimeInterface $Start_date): self
    {
        $this->Start_date = $Start_date;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->Comments;
    }

    public function setComments(string $Comments): self
    {
        $this->Comments = $Comments;

        return $this;
    }

    public function getTotalPrice(): ?string
    {
        return $this->Total_price;
    }

    public function setTotalPrice(string $Total_price): self
    {
        $this->Total_price = $Total_price;

        return $this;
    }

    public function getIsPaid(): ?bool
    {
        return $this->Is_paid;
    }

    public function setIsPaid(bool $Is_paid): self
    {
        $this->Is_paid = $Is_paid;

        return $this;
    }

    public function getPaymentType(): ?string
    {
        return $this->Payment_type;
    }

    public function setPaymentType(string $Payment_type): self
    {
        $this->Payment_type = $Payment_type;

        return $this;
    }

    public function getPaymentDate(): ?\DateTimeInterface
    {
        return $this->Payment_date;
    }

    public function setPaymentDate(\DateTimeInterface $Payment_date): self
    {
        $this->Payment_date = $Payment_date;

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

    public function getRoomId(): ?Rooms
    {
        return $this->Room_id;
    }

    public function setRoomId(?Rooms $Room_id): self
    {
        $this->Room_id = $Room_id;

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
            $foodOrder->setBookingId($this);
        }

        return $this;
    }

    public function removeFoodOrder(FoodOrders $foodOrder): self
    {
        if ($this->foodOrders->contains($foodOrder)) {
            $this->foodOrders->removeElement($foodOrder);
            // set the owning side to null (unless already changed)
            if ($foodOrder->getBookingId() === $this) {
                $foodOrder->setBookingId(null);
            }
        }

        return $this;
    }
}
