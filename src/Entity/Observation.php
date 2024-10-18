<?php

namespace App\Entity;

use App\Repository\ObservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ObservationRepository::class)]
#[ORM\HasLifecycleCallbacks] // Indiquer l'utilisation des événements de cycle de vie
class Observation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $createdBy = null;

    #[ORM\Column(length: 255)]
    private ?string $nameInsect = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'ObservationsFavorite')]
    private Collection $usersFavorite;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $primaryColorInsect = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $developmentStageInsect = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $organismHost = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $weather = null;

    #[ORM\Column(nullable: true)]
    private ?float $temperature = null;

    #[ORM\Column(nullable: true)]
    private ?float $rateHumidity = null;

    #[ORM\Column(nullable: true)]
    private ?float $longitude = null;

    #[ORM\Column(nullable: true)]
    private ?float $latitude = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $habitat = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateObservationRegister = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateObservation = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

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

    #[ORM\PrePersist]
    public function prePersist(): void
    {
        if ($this->dateObservationRegister === null) {
            $this->dateObservationRegister = new \DateTime();
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?User $user): self
    {
        $this->createdBy = $user;

        return $this;
    }

    public function getNameInsect(): ?string
    {
        return $this->nameInsect;
    }

    public function setNameInsect(string $nameInsect): self
    {
        $this->nameInsect = $nameInsect;
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

    public function getPrimaryColorInsect(): ?string
    {
        return $this->primaryColorInsect;
    }

    public function setPrimaryColorInsect(?string $primaryColorInsect): static
    {
        $this->primaryColorInsect = $primaryColorInsect;

        return $this;
    }

    public function getDevelopmentStageInsect(): ?string
    {
        return $this->developmentStageInsect;
    }

    public function setDevelopmentStageInsect(?string $developmentStageInsect): static
    {
        $this->developmentStageInsect = $developmentStageInsect;

        return $this;
    }

    public function getOrganismHost(): ?string
    {
        return $this->organismHost;
    }

    public function setOrganismHost(?string $organismHost): static
    {
        $this->organismHost = $organismHost;

        return $this;
    }

    public function getWeather(): ?string
    {
        return $this->weather;
    }

    public function setWeather(?string $weather): static
    {
        $this->weather = $weather;

        return $this;
    }

    public function getTemperature(): ?float
    {
        return $this->temperature;
    }

    public function setTemperature(?float $temperature): static
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getRateHumidity(): ?float
    {
        return $this->rateHumidity;
    }

    public function setRateHumidity(?float $rateHumidity): static
    {
        $this->rateHumidity = $rateHumidity;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(?float $longitude): static
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(?float $latitude): static
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getHabitat(): ?string
    {
        return $this->habitat;
    }

    public function setHabitat(?string $habitat): static
    {
        $this->habitat = $habitat;

        return $this;
    }

    public function getDateObservationRegister(): ?\DateTimeInterface
    {
        return $this->dateObservationRegister;
    }

    public function setDateObservationRegister(?\DateTimeInterface $dateObservationRegister): static
    {
        $this->dateObservationRegister = $dateObservationRegister;

        return $this;
    }

    public function getDateObservation(): ?\DateTimeInterface
    {
        return $this->dateObservation;
    }

    public function setDateObservation(?\DateTimeInterface $dateObservation): static
    {
        $this->dateObservation = $dateObservation;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }
}
