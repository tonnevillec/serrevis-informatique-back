<?php

namespace App\Entity;

use App\Repository\ServiceAssistanceDatasRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: ServiceAssistanceDatasRepository::class)]
class ServiceAssistanceDatas
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
    private ?ServiceAssistance $parent = null;

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

    public function getParent(): ?ServiceAssistance
    {
        return $this->parent;
    }

    public function setParent(?ServiceAssistance $parent): static
    {
        $this->parent = $parent;

        return $this;
    }
}
