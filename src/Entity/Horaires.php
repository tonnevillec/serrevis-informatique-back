<?php

namespace App\Entity;

use App\Repository\HorairesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HorairesRepository::class)]
class Horaires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $jour = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $matin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $apm = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?string
    {
        return $this->jour;
    }

    public function setJour(string $jour): static
    {
        $this->jour = $jour;

        return $this;
    }

    public function getMatin(): ?string
    {
        return $this->matin;
    }

    public function setMatin(?string $matin): static
    {
        $this->matin = $matin;

        return $this;
    }

    public function getApm(): ?string
    {
        return $this->apm;
    }

    public function setApm(?string $apm): static
    {
        $this->apm = $apm;

        return $this;
    }
}
