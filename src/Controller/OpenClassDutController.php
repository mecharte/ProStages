<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Formation;
use App\Entity\Stage;
use App\Entity\Entreprise;
use App\Repository\EntrepriseRepository;

class OpenClassDutController extends AbstractController
{
   #/**
   # * @Route("/accueil", name="open_class_dut")
   # */
    public function index()
    {
        //Récuperer le Repository Formation
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);
        //Récupérer les formations de la BD
        $stages = $repositoryStage->findAll();
        //Envoyer les formations récupérées à la vue chargée de les afficher
        return $this->render('open_class_dut/index.html.twig', ['stages' => $stages]);
    }

    // Injection d'indépendances
    // On a besoin d'une varaibles repositoryEntreprises pour que ca fonctionne 
    //on demande donc que le système le fasse à notre place grace à la variable qui est dans la fonction
    public function index2(EntrepriseRepository $repositoryEntreprise)
    { 
        //Récupérer les entreprises de la BD
        $entreprises = $repositoryEntreprise->findAll();
        //Envoyer les entreprises récupérées à la vue chargée de les afficher
        return $this->render('open_class_dut/entreprises.html.twig', ['entreprises' => $entreprises]);
    }

    public function index3()
    {
        //Récuperer le Repository Formation
        $repositoryFormation = $this->getDoctrine()->getRepository(Formation::class);
        //Récupérer les formations de la BD
        $formations = $repositoryFormation->findAll();
        //Envoyer les formations récupérées à la vue chargée de les afficher
        return $this->render('open_class_dut/formation.html.twig', ['formations' => $formations]);
    }
    
    
    public function index4($id)
    {
        //Récuperer le Repository stage
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);
        //Récupérer les stages de la BD
        $stages = $repositoryStage->find($id);
        //Envoyer les stages récupérées à la vue chargée de les afficher
        return $this->render('open_class_dut/stages.html.twig', ['stages' => $stages]);
    }

    public function index5($nomEntreprise)
    {
        //Récuperer le Repository stage
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);
        //Récupérer les stages de la BD
        $stagesParEntreprise = $repositoryStage->findStageParEntreprise($nomEntreprise);
        //Envoyer les stages récupérées à la vue chargée de les afficher
        return $this->render('open_class_dut/entreprise_stages.html.twig', ['stagesParEntreprise' => $stagesParEntreprise]);
    }

    public function index6($formations)
    {
        //Récuperer le Repository stage
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);
        //Récupérer les stages de la BD
        $stagesParFormation = $repositoryStage->findStageParEntreprise($formations);
        //Envoyer les stages récupérées à la vue chargée de les afficher
        return $this->render('open_class_dut/formation_stages.html.twig', ['stagesParFormation' => $stagesParFormation]);
    }

}
