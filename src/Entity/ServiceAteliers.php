<?php

namespace App\Entity;

use App\Repository\ServiceAteliersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: ServiceAteliersRepository::class)]
class ServiceAteliers
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
     * @var Collection<int, ServiceAteliersDatas>
     */
    #[ORM\OneToMany(targetEntity: ServiceAteliersDatas::class, mappedBy: 'parent')]
    #[Groups(['READ'])]
    private Collection $donnees;

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
     * @return Collection<int, ServiceAteliersDatas>
     */
    public function getDonnees(): Collection
    {
        return $this->donnees;
    }

    public function addDonnee(ServiceAteliersDatas $donnee): static
    {
        if (!$this->donnees->contains($donnee)) {
            $this->donnees->add($donnee);
            $donnee->setParent($this);
        }

        return $this;
    }

    public function removeDonnee(ServiceAteliersDatas $donnee): static
    {
        if ($this->donnees->removeElement($donnee)) {
            // set the owning side to null (unless already changed)
            if ($donnee->getParent() === $this) {
                $donnee->setParent(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->titre;
    }
}
