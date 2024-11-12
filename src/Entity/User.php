<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'createdBy', targetEntity: Observation::class)]
    private Collection $observationsCreated;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $pseudo = null;

    /**
     * @var Collection<int, Insect>
     */
    #[ORM\ManyToMany(targetEntity: Insect::class, inversedBy: 'usersLike')]
    private Collection $InsectsFavorite;

    /**
     * @var Collection<int, Observation>
     */
    #[ORM\ManyToMany(targetEntity: Observation::class, inversedBy: 'users')]
    private Collection $user_observation;

    public function __construct()
    {
        $this->InsectsFavorite = new ArrayCollection();
        $this->user_observation = new ArrayCollection();
        $this->observationsCreated = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObservationsCreated(): Collection
    {
        return $this->observationsCreated;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): static
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * @return Collection<int, Insect>
     */
    public function getInsectsFavorite(): Collection
    {
        return $this->InsectsFavorite;
    }

    public function addInsectsFavorite(Insect $insectsFavorite): static
    {
        if (!$this->InsectsFavorite->contains($insectsFavorite)) {
            $this->InsectsFavorite->add($insectsFavorite);
        }

        return $this;
    }

    public function removeInsectsFavorite(Insect $insectsFavorite): static
    {
        $this->InsectsFavorite->removeElement($insectsFavorite);

        return $this;
    }

    /**
     * @return Collection<int, Observation>
     */
    public function getObservationsFavorite(): Collection
    {
        return $this->user_observation;
    }

    public function addObservationsFavorite(Observation $userObservation): static
    {
        if (!$this->user_observation->contains($userObservation)) {
            $this->user_observation->add($userObservation);
        }

        return $this;
    }

    public function removeObservationsFavorite(Observation $userObservation): static
    {
        $this->user_observation->removeElement($userObservation);

        return $this;
    }
}
