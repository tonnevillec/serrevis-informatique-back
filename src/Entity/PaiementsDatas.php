<?php

namespace App\Entity;

use App\Repository\PaiementsDatasRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: PaiementsDatasRepository::class)]
class PaiementsDatas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['READ'])]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: false)]
    #[Groups(['READ'])]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['READ'])]
    private ?string $description = null;

    #[ORM\Column(length: 10, nullable: true)]
    #[Groups(['READ'])]
    private ?string $position = null;

    #[ORM\ManyToOne(inversedBy: 'donnees')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Paiements $parent = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(?string $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function getParent(): ?Paiements
    {
        return $this->parent;
    }

    public function setParent(?Paiements $parent): static
    {
        $this->parent = $parent;

        return $this;
    }
}
