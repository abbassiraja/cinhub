<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombredetickets;

    /**
     * @ORM\ManyToOne(targetEntity=Film::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $film;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Cinema::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cinema;

    /**
     * @ORM\ManyToOne(targetEntity=SalleDeProjection::class, inversedBy="reservations")
     */
    private $salledeprojection;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombredetickets(): ?int
    {
        return $this->nombredetickets;
    }

    public function setNombredetickets(int $nombredetickets): self
    {
        $this->nombredetickets = $nombredetickets;

        return $this;
    }

    public function getFilm(): ?Film
    {
        return $this->film;
    }

    public function setFilm(?Film $film): self
    {
        $this->film = $film;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCinema(): ?Cinema
    {
        return $this->cinema;
    }

    public function setCinema(?Cinema $cinema): self
    {
        $this->cinema = $cinema;

        return $this;
    }

    public function getSalledeprojection(): ?SalleDeProjection
    {
        return $this->salledeprojection;
    }

    public function setSalledeprojection(?SalleDeProjection $salledeprojection): self
    {
        $this->salledeprojection = $salledeprojection;

        return $this;
    }
}
