<?php

namespace App\Repository;

use App\Entity\ServiceDepannageDatas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ServiceDepannageDatas>
 */
class ServiceDepannageDatasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServiceDepannageDatas::class);
    }
}
