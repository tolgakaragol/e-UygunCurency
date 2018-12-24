<?php

namespace App\Repository;

use App\Entity\SiraliKur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SiraliKur|null find($id, $lockMode = null, $lockVersion = null)
 * @method SiraliKur|null findOneBy(array $criteria, array $orderBy = null)
 * @method SiraliKur[]    findAll()
 * @method SiraliKur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SiraliKurRepository extends ServiceEntityRepository implements KurInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SiraliKur::class);
        $entityManager = $this->getEntityManager();
        $this->connection = $entityManager->getConnection();
    }

    public function getLatest()
    {
        $query = $this->createQueryBuilder('s')
            ->orderBy('s.id', 'DESC')
            ->setMaxResults( 1 )
            ->getQuery();
        return $query->getArrayResult();
    }

    public function hasCurrency()
    {
        return !empty($this->getLatest());
    }

    public function updateUsd($rates)
    {
        $rates = json_encode($rates);

        $query = "UPDATE `sirali_kur` SET usd='$rates' WHERE id=(SELECT MAX(id) FROM `sirali_kur`)";

        return $this->connection->executeUpdate($query);
    }

    public function updateEur($rates)
    {
        $rates = json_encode($rates);
        $query = "UPDATE `sirali_kur` SET eur='$rates' WHERE id=(SELECT MAX(id) FROM `sirali_kur`)";

        return $this->connection->executeUpdate($query);
    }

    public function updateGbp($rates)
    {
        $rates = json_encode($rates);
        $query = "UPDATE `sirali_kur` SET gbp='$rates' WHERE id=(SELECT MAX(id) FROM `sirali_kur`)";

        return $this->connection->executeUpdate($query);
    }

    public function insertCurrencies($rates)
    {
        $sk = new SiraliKur();
        $sk->setUsd($rates['usd']);
        $sk->setEur($rates['eur']);
        $sk->setGbp($rates['gbp']);
        $entityManager = $this->getEntityManager();
        $entityManager->persist($sk);
        $entityManager->flush();
    }

    public function testRepostory()
    {
        $em = new SiraliKur();/*
        $em->setUsd(1);
        $em->setUsdApiUrl(1);
        $em->setEur(1);
        $em->setEurApiUrl(1);
        $em->setGbp(1);
        $em->setGbpApiUrl(1);*/
        $em->setUsd(['a'=>2,'b'=>2]);
        $em->setEur(['a'=>1,'b'=>2]);
        $em->setGbp(['a'=>1,'b'=>2]);
        $entityManager = $this->getEntityManager();
        $entityManager->persist($em);
        $entityManager->flush();
    }

    // /**
    //  * @return SiraliKur[] Returns an array of SiraliKur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SiraliKur
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
