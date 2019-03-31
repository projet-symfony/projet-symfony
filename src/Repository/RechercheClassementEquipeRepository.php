<?php

namespace App\Repository;

use App\Entity\RechercheClassementEquipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RechercheClassementEquipe|null find($id, $lockMode = null, $lockVersion = null)
 * @method RechercheClassementEquipe|null findOneBy(array $criteria, array $orderBy = null)
 * @method RechercheClassementEquipe[]    findAll()
 * @method RechercheClassementEquipe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RechercheClassementEquipeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RechercheClassementEquipe::class);
    }

    // /**
    //  * @return RechercheClassementEquipe[] Returns an array of RechercheClassementEquipe objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RechercheClassementEquipe
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
