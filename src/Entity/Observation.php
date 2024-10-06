<?php

namespace App\Entity;

use App\Repository\ObservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @var Collection<int, User>
     */
    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'ObservationsFavorite')]
    private Collection $usersFavorite;

    public function __construct(array $init = [])
    {
        $this->hydrate($init);
        $this->usersFavorite = new ArrayCollection();
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

    /**
     * @return Collection<int, User>
     */
    public function getUsersFavorite(): Collection
    {
        return $this->usersFavorite;
    }

    public function addUsersFavorite(User $usersFavorite): static
    {
        if (!$this->usersFavorite->contains($usersFavorite)) {
            $this->usersFavorite->add($usersFavorite);
            $usersFavorite->addObservationsFavorite($this);
        }

        return $this;
    }

    public function removeUsersFavorite(User $usersFavorite): static
    {
        if ($this->usersFavorite->removeElement($usersFavorite)) {
            $usersFavorite->removeObservationsFavorite($this);
        }

        return $this;
    }
}
