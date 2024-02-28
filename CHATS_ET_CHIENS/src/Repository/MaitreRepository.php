<?php

namespace App\Repository;

use App\Entity\Maitre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Maitre>
 *
 * @method Maitre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Maitre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Maitre[]    findAll()
 * @method Maitre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaitreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Maitre::class);
    }

    //    /**
    //     * @return Maitre[] Returns an array of Maitre objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('m.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Maitre
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
