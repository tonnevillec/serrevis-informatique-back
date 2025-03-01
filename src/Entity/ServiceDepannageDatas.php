<?php

namespace App\Entity;

use App\Repository\ServiceDepannageDatasRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: ServiceDepannageDatasRepository::class)]
class ServiceDepannageDatas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['READ'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['READ'])]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['READ'])]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['READ'])]
    private ?string $valeur = null;

    #[ORM\Column(length: 10, nullable: true)]
    #[Groups(['READ'])]
    private ?string $position = null;

    #[ORM\ManyToOne(inversedBy: 'donnees')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ServiceDepannage $parent = null;

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

    public function getValeur(): ?string
    {
        return $this->valeur;
    }

    public function setValeur(?string $valeur): static
    {
        $this->valeur = $valeur;

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

    public function getParent(): ?ServiceDepannage
    {
        return $this->parent;
    }

    public function setParent(?ServiceDepannage $parent): static
    {
        $this->parent = $parent;

        return $this;
    }
}
