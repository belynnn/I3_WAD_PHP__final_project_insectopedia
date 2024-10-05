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
    private ?string $insecteName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

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

    public function getInsecteName(): ?string
    {
        return $this->insecteName;
    }

    public function setInsecteName(string $insecteName): self
    {
        $this->insecteName = $insecteName;
        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;
        return $this;
    }
}
