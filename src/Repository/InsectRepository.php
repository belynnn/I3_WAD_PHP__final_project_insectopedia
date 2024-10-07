<?php

namespace App\Repository;

use App\Entity\Insect;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Insect>
 */
class InsectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Insect::class);
    }

    public function findInsectsBySearchTerm(string $term): array
    {
        return $this->createQueryBuilder('i')
            ->where('i.nameInsect LIKE :term')
            ->setParameter('term', '%' . $term . '%')
            ->getQuery()
            ->getResult();
    }
}