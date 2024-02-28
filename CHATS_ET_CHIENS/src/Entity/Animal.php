<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\AnimalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
#[ApiResource]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $espece = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Maitre $idMaitre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEspece(): ?string
    {
        return $this->espece;
    }

    public function setEspece(string $espece): static
    {
        $this->espece = $espece;

        return $this;
    }

    public function getIdMaitre(): ?Maitre
    {
        return $this->idMaitre;
    }

    public function setIdMaitre(?Maitre $idMaitre): static
    {
        $this->idMaitre = $idMaitre;

        return $this;
    }
}
