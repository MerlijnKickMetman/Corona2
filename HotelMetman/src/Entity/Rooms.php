<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RoomsRepository")
 */
class Rooms
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
    private $Type;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $Price;

    /**
     * @ORM\Column(type="integer")
     */
    private $Num_beds;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Availability;

    /**
     * @ORM\Column(type="integer")
     */
    private $Room_floor;

    /**
     * @ORM\Column(type="integer")
     */
    private $Room_number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Booking", mappedBy="Room_id")
     */
    private $bookings;

    public function __construct()
    {
        $this->bookings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

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

    public function getNumBeds(): ?int
    {
        return $this->Num_beds;
    }

    public function setNumBeds(int $Num_beds): self
    {
        $this->Num_beds = $Num_beds;

        return $this;
    }

    public function getAvailability(): ?string
    {
        return $this->Availability;
    }

    public function setAvailability(string $Availability): self
    {
        $this->Availability = $Availability;

        return $this;
    }

    public function getRoomFloor(): ?int
    {
        return $this->Room_floor;
    }

    public function setRoomFloor(int $Room_floor): self
    {
        $this->Room_floor = $Room_floor;

        return $this;
    }

    public function getRoomNumber(): ?int
    {
        return $this->Room_number;
    }

    public function setRoomNumber(int $Room_number): self
    {
        $this->Room_number = $Room_number;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

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
            $booking->setRoomId($this);
        }

        return $this;
    }

    public function removeBooking(Booking $booking): self
    {
        if ($this->bookings->contains($booking)) {
            $this->bookings->removeElement($booking);
            // set the owning side to null (unless already changed)
            if ($booking->getRoomId() === $this) {
                $booking->setRoomId(null);
            }
        }

        return $this;
    }
}
