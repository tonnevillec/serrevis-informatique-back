<?php

namespace App\Entity;

use App\Repository\PaiementsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: PaiementsRepository::class)]
class Paiements
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['READ'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['READ'])]
    private ?string $titre = null;

    /**
     * @var Collection<int, PaiementsDatas>
     */
    #[ORM\OneToMany(targetEntity: PaiementsDatas::class, mappedBy: 'parent')]
    #[Groups(['READ'])]
    private Collection $donnees;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['READ'])]
    private ?string $color = null;

    public function __construct()
    {
        $this->donnees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * @return Collection<int, PaiementsDatas>
     */
    public function getDonnees(): Collection
    {
        return $this->donnees;
    }

    public function addDonnee(PaiementsDatas $donnee): static
    {
        if (!$this->donnees->contains($donnee)) {
            $this->donnees->add($donnee);
            $donnee->setParent($this);
        }

        return $this;
    }

    public function removeDonnee(PaiementsDatas $donnee): static
    {
        if ($this->donnees->removeElement($donnee)) {
            // set the owning side to null (unless already changed)
            if ($donnee->getParent() === $this) {
                $donnee->setParent(null);
            }
        }

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function __toString(): string
    {
        return $this->titre;
    }
}
