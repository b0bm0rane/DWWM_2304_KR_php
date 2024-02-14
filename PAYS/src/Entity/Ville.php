<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\VilleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VilleRepository::class)]
#[ApiResource]
class Ville
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 6, options: ["fixed" => true])]
    private ?string $codePostalVille = null;

    #[ORM\Column(length: 255)]
    private ?string $nomVille = null;

    #[ORM\Column(length: 2, options: ["fixed" => true])]
    private ?string $codePays = null;

    #[ORM\Column(length: 255)]
    private ?string $nomPays = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodePostalVille(): ?string
    {
        return $this->codePostalVille;
    }

    public function setCodePostalVille(string $codePostalVille): static
    {
        $this->codePostalVille = $codePostalVille;

        return $this;
    }

    public function getNomVille(): ?string
    {
        return $this->nomVille;
    }

    public function setNomVille(string $nomVille): static
    {
        $this->nomVille = $nomVille;

        return $this;
    }

    public function getCodePays(): ?string
    {
        return $this->codePays;
    }

    public function setCodePays(string $codePays): static
    {
        $this->codePays = $codePays;

        return $this;
    }

    public function getNomPays(): ?string
    {
        return $this->nomPays;
    }

    public function setNomPays(string $nomPays): static
    {
        $this->nomPays = $nomPays;

        return $this;
    }
}
