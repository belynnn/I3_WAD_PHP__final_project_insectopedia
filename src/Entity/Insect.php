<?php

namespace App\Entity;

use App\Repository\InsectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InsectRepository::class)]
class Insect
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nameInsect = null;

    #[ORM\Column(length: 255)]
    private ?string $species = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $kingdom = null;

    #[ORM\Column(length: 255)]
    private ?string $phylum = null;

    #[ORM\Column(length: 255)]
    private ?string $class = null;

    #[ORM\Column(length: 255)]
    private ?string $orderInsect = null;

    #[ORM\Column(length: 255)]
    private ?string $family = null;

    #[ORM\Column(length: 255)]
    private ?string $describedBy = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $yearDescribed = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $activity = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cycle = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    /**
     * @var Collection<int, User>
     */
    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'InsectsFavorite')]
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

    public function getNameInsect(): ?string
    {
        return $this->nameInsect;
    }

    public function setNameInsect(string $nameInsect): static
    {
        $this->nameInsect = $nameInsect;

        return $this;
    }

    public function getSpecies(): ?string
    {
        return $this->species;
    }

    public function setSpecies(string $species): static
    {
        $this->species = $species;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getKingdom(): ?string
    {
        return $this->kingdom;
    }

    public function setKingdom(string $kingdom): static
    {
        $this->kingdom = $kingdom;

        return $this;
    }

    public function getPhylum(): ?string
    {
        return $this->phylum;
    }

    public function setPhylum(string $phylum): static
    {
        $this->phylum = $phylum;

        return $this;
    }

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(string $class): static
    {
        $this->class = $class;

        return $this;
    }

    public function getOrderInsect(): ?string
    {
        return $this->orderInsect;
    }

    public function setOrderInsect(string $orderInsect): static
    {
        $this->orderInsect = $orderInsect;

        return $this;
    }

    public function getFamily(): ?string
    {
        return $this->family;
    }

    public function setFamily(string $family): static
    {
        $this->family = $family;

        return $this;
    }

    public function getDescribedBy(): ?string
    {
        return $this->describedBy;
    }

    public function setDescribedBy(string $describedBy): static
    {
        $this->describedBy = $describedBy;

        return $this;
    }

    public function getYearDescribed(): ?\DateTimeInterface
    {
        return $this->yearDescribed;
    }

    public function setYearDescribed(?\DateTimeInterface $yearDescribed): static
    {
        $this->yearDescribed = $yearDescribed;

        return $this;
    }

    public function getActivity(): ?string
    {
        return $this->activity;
    }

    public function setActivity(?string $activity): static
    {
        $this->activity = $activity;

        return $this;
    }

    public function getCycle(): ?string
    {
        return $this->cycle;
    }

    public function setCycle(?string $cycle): static
    {
        $this->cycle = $cycle;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

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
            $usersFavorite->addInsectsFavorite($this);
        }

        return $this;
    }

    public function removeUsersFavorite(User $usersFavorite): static
    {
        if ($this->usersFavorite->removeElement($usersFavorite)) {
            $usersFavorite->removeInsectsFavorite($this);
        }

        return $this;
    }
}
