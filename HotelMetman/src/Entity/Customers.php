<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CustomersRepository")
 */
class Customers
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
    private $Title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Full_name;

    /**
     * @ORM\Column(type="integer")
     */
    private $Phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Country;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Gender;

    /**
     * @ORM\Column(type="date")
     */
    private $Date_of_birth;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Booking", mappedBy="Customer_id")
     */
    private $bookings;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FoodOrders", mappedBy="Customer_id")
     */
    private $foodOrders;

    public function __construct()
    {
        $this->bookings = new ArrayCollection();
        $this->foodOrders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->Full_name;
    }

    public function setFullName(string $Full_name): self
    {
        $this->Full_name = $Full_name;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->Phone;
    }

    public function setPhone(int $Phone): self
    {
        $this->Phone = $Phone;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->Address;
    }

    public function setAddress(string $Address): self
    {
        $this->Address = $Address;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->Country;
    }

    public function setCountry(string $Country): self
    {
        $this->Country = $Country;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->Gender;
    }

    public function setGender(string $Gender): self
    {
        $this->Gender = $Gender;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->Date_of_birth;
    }

    public function setDateOfBirth(\DateTimeInterface $Date_of_birth): self
    {
        $this->Date_of_birth = $Date_of_birth;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->Username;
    }

    public function setUsername(string $Username): self
    {
        $this->Username = $Username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): self
    {
        $this->Password = $Password;

        return $this;
    }

    /**
     * @return Collection|Booking[]
     */
    public function getBookings(): Collection
    {
        return $this->bookings;
    }

    public function addBooking(Booking $booking): self
    {
        if (!$this->bookings->contains($booking)) {
            $this->bookings[] = $booking;
            $booking->setCustomerId($this);
        }

        return $this;
    }

    public function removeBooking(Booking $booking): self
    {
        if ($this->bookings->contains($booking)) {
            $this->bookings->removeElement($booking);
            // set the owning side to null (unless already changed)
            if ($booking->getCustomerId() === $this) {
                $booking->setCustomerId(null);
            }
        }

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
            $foodOrder->setCustomerId($this);
        }

        return $this;
    }

    public function removeFoodOrder(FoodOrders $foodOrder): self
    {
        if ($this->foodOrders->contains($foodOrder)) {
            $this->foodOrders->removeElement($foodOrder);
            // set the owning side to null (unless already changed)
            if ($foodOrder->getCustomerId() === $this) {
                $foodOrder->setCustomerId(null);
            }
        }

        return $this;
    }

    public function __toString() {
        return $this->getFullName();
    }
}
