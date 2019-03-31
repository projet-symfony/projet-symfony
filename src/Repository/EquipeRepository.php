<?php

namespace App\Repository;

use App\Entity\Equipe;

use App\Entity\RechercheClassementEquipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;



use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Equipe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Equipe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Equipe[]    findAll()
 * @method Equipe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Equipe::class);
    }


    /**
     * @param RechercheClassementEquipe $recherche
     * @return Query
     */
    public function printAll(RechercheClassementEquipe $recherche):Query
    {
        $query = $this->createQueryBuilder('e')
            ->orderBy('e.points', 'DESC')
            ->setMaxResults(10);

        if($recherche->getPays()){
            $query = $query
                ->andWhere('e.Pays = :pays')
                ->setParameter('pays',$recherche->getPays());
        }

        if($recherche->getLigue()){
            $query = $query
                ->andWhere('e.Ligue = :Ligue')
                ->setParameter('Ligue',$recherche->getLigue());
        }

        return $query->getQuery();

    }




    // /**
    //  * @return Equipe[] Returns an array of Equipe objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Equipe
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
