<?php

namespace App\Repository;

use App\Entity\Stage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Stage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Stage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Stage[]    findAll()
 * @method Stage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Stage::class);
    }

    // /**
    //  * @return Stage[] Returns an array of Stage objects
    //  */
    
    public function findStageParEntreprise($nomEntreprise)
    {
        return $this->createQueryBuilder('s')
        ->join('s.nomEntreprise','e')
            ->andWhere('e.nom = :nomEntreprise')
            ->setParameter('nomEntreprise', $nomEntreprise)
            ->orderBy('e.nom', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findStageParFormation($formations)
    {
        
        $gestionnaireEntite = $this->getEntityManager();
        $requete = $gestionnaireEntite->createQuery(
          'SELECT s, f
          FROM App\Entity\Stage s
          JOIN s.formations f
          WHERE f.nomCourt = :formations');
        $requete->setParameter('formations', $formations);
        return $requete->execute();
    }
    
    public function getStageEntrepriseEtFormation()
    {
        // Récupération du gestionnaire d'entité
        $gestionnaireEntite = $this->getEntityManager();

        // Construction de la requête
        $requete = $gestionnaireEntite->createQuery(
          'SELECT s, e, f
          FROM App\Entity\Stage s
          JOIN s.formations f
          JOIN s.nomEntreprise e');

        // Retourner les résultats
        return $requete->execute();

    }


    /*
    public function findOneBySomeField($value): ?Stage
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
