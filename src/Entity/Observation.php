<?php

namespace App\Entity;

use App\Repository\ObservationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ObservationRepository::class)]
class Observation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomInsecte = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomInsecte(): ?string
    {
        return $this->nomInsecte;
    }

    public function setNomInsecte(string $nomInsecte): static
    {
        $this->nomInsecte = $nomInsecte;

        return $this;
    }
}
