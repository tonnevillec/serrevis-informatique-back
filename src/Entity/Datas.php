<?php

namespace App\Entity;

use App\Repository\DatasRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DatasRepository::class)]
class Datas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $hero = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $alertMessage = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mail = null;

    #[ORM\Column(nullable: true)]
    private ?float $mapCoordonneesX = null;

    #[ORM\Column(nullable: true)]
    private ?float $mapCoordonneesY = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHero(): ?string
    {
        return $this->hero;
    }

    public function setHero(?string $hero): static
    {
        $this->hero = $hero;

        return $this;
    }

    public function getAlertMessage(): ?string
    {
        return $this->alertMessage;
    }

    public function setAlertMessage(?string $alertMessage): static
    {
        $this->alertMessage = $alertMessage;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getMapCoordonneesX(): ?float
    {
        return $this->mapCoordonneesX;
    }

    public function setMapCoordonneesX(?float $mapCoordonneesX): static
    {
        $this->mapCoordonneesX = $mapCoordonneesX;

        return $this;
    }

    public function getMapCoordonneesY(): ?float
    {
        return $this->mapCoordonneesY;
    }

    public function setMapCoordonneesY(?float $mapCoordonneesY): static
    {
        $this->mapCoordonneesY = $mapCoordonneesY;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): static
    {
        $this->logo = $logo;

        return $this;
    }
}
