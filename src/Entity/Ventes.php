<?php

namespace App\Entity;

use App\Repository\VentesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: VentesRepository::class)]
class Ventes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['READ'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['READ'])]
    private ?string $titre = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['READ'])]
    private ?string $modele = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['READ'])]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    #[Groups(['READ'])]
    private ?string $dateMiseEnVente = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['READ'])]
    private ?string $pdf = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['READ'])]
    private ?string $prix = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['READ'])]
    private ?string $parametres = null;

    public function __construct()
    {
        $this->dateMiseEnVente = (new \DateTime())->format('d/m/Y');
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

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(?string $modele): static
    {
        $this->modele = $modele;

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

    public function getDateMiseEnVente(): ?string
    {
        return $this->dateMiseEnVente;
    }

    public function setDateMiseEnVente(string $dateMiseEnVente): static
    {
        $this->dateMiseEnVente = $dateMiseEnVente;

        return $this;
    }

    public function getPdf(): ?string
    {
        return $this->pdf;
    }

    public function setPdf(?string $pdf): static
    {
        $this->pdf = $pdf;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(?string $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getParametres(): ?string
    {
        return $this->parametres;
    }

    public function setParametres(?string $parametres): static
    {
        $this->parametres = $parametres;

        return $this;
    }
}
