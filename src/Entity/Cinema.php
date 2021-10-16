<?php

namespace App\Entity;

use App\Repository\CinemaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CinemaRepository::class)
 */
class Cinema
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_cinema;

    /**
     * @ORM\OneToMany(targetEntity=SalleDeProjection::class, mappedBy="cinema")
     */
    private $salleDeProjections;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="cinema")
     */
    private $reservations;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $numerodetéléphone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    public function __construct()
    {
        $this->salleDeProjections = new ArrayCollection();
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCinema(): ?string
    {
        return $this->nom_cinema;
    }

    public function setNomCinema(string $nom_cinema): self
    {
        $this->nom_cinema = $nom_cinema;

        return $this;
    }

    /**
     * @return Collection|SalleDeProjection[]
     */
    public function getSalleDeProjections(): Collection
    {
        return $this->salleDeProjections;
    }

    public function addSalleDeProjection(SalleDeProjection $salleDeProjection): self
    {
        if (!$this->salleDeProjections->contains($salleDeProjection)) {
            $this->salleDeProjections[] = $salleDeProjection;
            $salleDeProjection->setCinema($this);
        }

        return $this;
    }

    public function removeSalleDeProjection(SalleDeProjection $salleDeProjection): self
    {
        if ($this->salleDeProjections->removeElement($salleDeProjection)) {
            // set the owning side to null (unless already changed)
            if ($salleDeProjection->getCinema() === $this) {
                $salleDeProjection->setCinema(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setCinema($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getCinema() === $this) {
                $reservation->setCinema(null);
            }
        }

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNumerodetéléphone(): ?int
    {
        return $this->numerodetéléphone;
    }

    public function setNumerodetéléphone(int $numerodetéléphone): self
    {
        $this->numerodetéléphone = $numerodetéléphone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
