<?php

namespace App\Repository;

use App\Entity\Observation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Observation>
 */
class ObservationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Observation::class);
    }

    public function findRandomObservation(): ?Observation
    {
        $totalObservations = $this->createQueryBuilder('o')
        ->select('COUNT(o.id)')
        ->getQuery()
        ->getSingleScalarResult();

        if ($totalObservations > 0) {
            $randomIndex = random_int(0, $totalObservations - 1);

            return $this->createQueryBuilder('o')
                ->setFirstResult($randomIndex)
                ->setMaxResults(1)
                ->getQuery()
                ->getOneOrNullResult();
        }

        return null;
    }
}
