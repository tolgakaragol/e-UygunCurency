<?php

namespace App\Repository;

use App\Entity\UcuzKur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\DBAL\DriverManager;

/**
 * @method UcuzKur|null find($id, $lockMode = null, $lockVersion = null)
 * @method UcuzKur|null findOneBy(array $criteria, array $orderBy = null)
 * @method UcuzKur[]    findAll()
 * @method UcuzKur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UcuzKurRepository extends ServiceEntityRepository implements KurInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UcuzKur::class);
    }

    public function getLatest()
    {
        $query = $this->createQueryBuilder('u')
            ->orderBy('u.id', 'DESC')
            ->setMaxResults( 1 )
            ->getQuery();
        return $query->getArrayResult();
    }

    public function hasCurrency()
    {
        $query = $this->createQueryBuilder('u')
            ->orderBy('u.id', 'DESC')
            ->setMaxResults( 1 )
            ->getQuery();
        return !empty($query->getResult());
    }

    public function updateUsd($rates)
    {
        $rate = $rates['rate'];
        $apiUrl = $rates['apiUrl'];

        $entityManager = $this->getEntityManager();
        $connection = $entityManager->getConnection();
        $query = "UPDATE `ucuz_kur` SET usd_rate='$rate', usd_api_url='$apiUrl' WHERE id= (SELECT MAX(id) FROM `ucuz_kur`)";

        return $connection->executeUpdate($query);
    }

    public function updateEur($rates)
    {
        $rate = $rates['rate'];
        $apiUrl = $rates['apiUrl'];

        $entityManager = $this->getEntityManager();
        $connection = $entityManager->getConnection();
        $query = "UPDATE `ucuz_kur` SET eur_rate='$rate', eur_api_url='$apiUrl' WHERE id= (SELECT MAX(id) FROM `ucuz_kur`)";

        return $connection->executeUpdate($query);
    }

    public function updateGbp($rates)
    {
        $rate = $rates['rate'];
        $apiUrl = $rates['apiUrl'];

        $entityManager = $this->getEntityManager();
        $connection = $entityManager->getConnection();
        $query = "UPDATE `ucuz_kur` SET gbp_rate='$rate', gbp_api_url='$apiUrl' WHERE id=(SELECT MAX(id) FROM `ucuz_kur`)";

        return $connection->executeUpdate($query);
    }

    public function insertCurrencies($rates)
    {
        $uc = new UcuzKur();
        $uc->setUsdRate($rates['usd']['rate']);
        $uc->setEurRate($rates['eur']['rate']);
        $uc->setGbpRate($rates['gbp']['rate']);
        $uc->setUsdApiUrl($rates['usd']['apiUrl']);
        $uc->setEurApiUrl($rates['eur']['apiUrl']);
        $uc->setGbpApiUrl($rates['gbp']['apiUrl']);
        $entityManager = $this->getEntityManager();
        $entityManager->persist($uc);
        $entityManager->flush();
    }

    // /**
    //  * @return UcuzKur[] Returns an array of UcuzKur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UcuzKur
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
