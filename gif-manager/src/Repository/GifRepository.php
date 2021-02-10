<?php

namespace App\Repository;

use App\Entity\Gif;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Gif|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gif|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gif[]    findAll()
 * @method Gif[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GifRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gif::class);
    }

    /**
     * @return Gif[] Retourne un tableau d'objets Gifs ordonné par le plus récent
     */
    public function findAllGifsOrderByDesc(): array
    {
        return $this->createQueryBuilder('g')
            ->orderBy('g.id', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findGifsWithSearchBar($searchTerm)
    {
        return $this->createQueryBuilder('g')
            ->innerJoin('g.tagId', 't')
            ->andWhere('g.name LIKE :searchTerm OR t.name LIKE :searchTerm')
            ->setParameter('searchTerm', '%' . $searchTerm . '%')
            ->orderBy('g.id', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Gif[] Returns an array of Gif objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Gif
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
