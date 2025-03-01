<?php

namespace App\Controller;

use App\Entity\Boutique;
use App\Entity\BoutiquePhotos;
use App\Entity\Datas;
use App\Entity\Horaires;
use App\Entity\MentionsLegales;
use App\Entity\Paiements;
use App\Entity\PolitiqueConfidentialite;
use App\Entity\ServiceAssistance;
use App\Entity\ServiceAteliers;
use App\Entity\ServiceDepannage;
use App\Entity\ServiceDepannageDatas;
use App\Entity\Technicien;
use App\Entity\Valeurs;
use App\Entity\Ventes;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api')]
final class ApiController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $em,
    )
    {}

    #[Route('/datas', methods: ['GET'])]
    public function datas(): JsonResponse
    {
        return $this->json(
            $this->em->getRepository(Datas::class)->find(1)
        );
    }

    #[Route('/service/{service}', methods: ['GET'])]
    public function services(string $service): JsonResponse
    {
        $return = match ($service) {
            'depannage' => $this->em->getRepository(ServiceDepannage::class)->findAll(),
            'ateliers' => $this->em->getRepository(ServiceAteliers::class)->findAll(),
            'assistance' => $this->em->getRepository(ServiceAssistance::class)->findAll(),
            default => null,
        };

        return $this->json(
            $return
            , 200
            , []
            , ['groups' => ['READ']]
        );
    }

    #[Route('/paiements', methods: ['GET'])]
    public function paiements(): JsonResponse
    {
        return $this->json(
            $this->em->getRepository(Paiements::class)->findAll()
            , 200
            , []
            , ['groups' => ['READ']]
        );
    }

    #[Route('/ventes', methods: ['GET'])]
    public function ventes(): JsonResponse
    {
        return $this->json(
            $this->em->getRepository(Ventes::class)->findAll()
            , 200
            , []
            , ['groups' => ['READ']]
        );
    }

    #[Route('/boutique', methods: ['GET'])]
    public function boutique(): JsonResponse
    {
        return $this->json(
            $this->em->getRepository(Boutique::class)->find(1)
        );
    }

    #[Route('/boutiquePhotos', methods: ['GET'])]
    public function boutiquePhotos(): JsonResponse
    {
        return $this->json(
            $this->em->getRepository(BoutiquePhotos::class)->findAll()
        );
    }

    #[Route('/technicien', methods: ['GET'])]
    public function technicien(): JsonResponse
    {
        return $this->json(
            $this->em->getRepository(Technicien::class)->find(1)
        );
    }

    #[Route('/valeurs', methods: ['GET'])]
    public function valeurs(): JsonResponse
    {
        return $this->json(
            $this->em->getRepository(Valeurs::class)->find(1)
        );
    }

    #[Route('/horaires', methods: ['GET'])]
    public function horaires(): JsonResponse
    {
        return $this->json(
            $this->em->getRepository(Horaires::class)->findAll()
        );
    }

    #[Route('/mentionsLegales', methods: ['GET'])]
    public function mentionsLegales(): JsonResponse
    {
        return $this->json(
            $this->em->getRepository(MentionsLegales::class)->find(1)
        );
    }

    #[Route('/politiqueConfidentialite', methods: ['GET'])]
    public function politiqueConfidentialite(): JsonResponse
    {
        return $this->json(
            $this->em->getRepository(PolitiqueConfidentialite::class)->find(1)
        );
    }
}
