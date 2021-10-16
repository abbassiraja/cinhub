<?php

namespace App\Entity;

use App\Repository\SalleDeProjectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SalleDeProjectionRepository::class)
 */
class SalleDeProjection
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
    private $image;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombre_de_place;

    /**
     * @ORM\ManyToOne(targetEntity=Cinema::class, inversedBy="salleDeProjections")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cinema;

    /**
     * @ORM\OneToMany(targetEntity=Film::class, mappedBy="salleDeProjection")
     */
    private $film;

    public function __construct()
    {
        $this->film = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNombreDePlace(): ?int
    {
        return $this->nombre_de_place;
    }

    public function setNombreDePlace(int $nombre_de_place): self
    {
        $this->nombre_de_place = $nombre_de_place;

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

    /**
     * @return Collection|Film[]
     */
    public function getFilm(): Collection
    {
        return $this->film;
    }

    public function addFilm(Film $film): self
    {
        if (!$this->film->contains($film)) {
            $this->film[] = $film;
            $film->setSalleDeProjection($this);
        }

        return $this;
    }

    public function removeFilm(Film $film): self
    {
        if ($this->film->removeElement($film)) {
            // set the owning side to null (unless already changed)
            if ($film->getSalleDeProjection() === $this) {
                $film->setSalleDeProjection(null);
            }
        }

        return $this;
    }
}
