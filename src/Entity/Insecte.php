<?php

namespace App\Entity;

use App\Repository\InsecteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InsecteRepository::class)]
class Insecte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomInsecte = null;

    public function __construct(array $init = [])
    {
        $this->hydrate($init); 
    }

    public function hydrate (array $vals = []){
        foreach ($vals as $key=> $val){
            $method = "set" . ucfirst($key); 
            if (method_exists($this,$method)){
                $this->$method ($val);
            }
        }
    }

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
