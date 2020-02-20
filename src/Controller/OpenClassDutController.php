<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Formation;
use App\Entity\Stage;
use App\Entity\Entreprise;
use App\Repository\EntrepriseRepository;
use Symfony\Component\Form\Extension\Core\Type\TextareaType; // pour rajouter un type de formulaire il faut rajouter le USE
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Form\EntrepriseType;
use App\Form\StageType;


class OpenClassDutController extends AbstractController
{
   #/**
   # * @Route("/", name="open_class_dut")
   # */
    public function accueil()
    {
        //Récuperer le Repository Formation
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);
        //Récupérer les formations de la BD
        $stages = $repositoryStage->getStageEntrepriseEtFormation();
        //Envoyer les formations récupérées à la vue chargée de les afficher
        return $this->render('open_class_dut/index.html.twig', ['stages' => $stages]);
    }

    public function ajouterEntreprise(Request $request, ObjectManager $manager)
    {
        //Création d'une entreprise vierge qui sera remplie par le formulaire
        $newEntreprise = new Entreprise();
        //Création d'un formulaire permettant de saisir une entreprise
        $formulaireEntreprise = $this->createForm(EntrepriseType::class,$newEntreprise);

        /* On demande au formulaire d'analyser la dernière requete http. Si le tableau POST contenu dans cette requete
        contient des varaibles id,nom activite,adresse,siteWeb,stages alors la méthode handleRequest() 
        récupère les valeurs de ces varialbes et les affecte à l'objet $ressource*/
        $formulaireEntreprise->handleRequest($request);

        if ($formulaireEntreprise->isSubmitted()&& $formulaireEntreprise->isValid()){

            //Enregistrer l'entreprise en base de données
            $manager->persist($newEntreprise);
            $manager->flush();

            //Rediriger l'utilisateur vers la page d'accueil
            return $this->redirectToRoute('proStage');

        }

        // Création de la représentation graphique du formulaire
        $vueFormulaire=$formulaireEntreprise->createView();

        //Afficher le formulaire pour créer une entreprise
        return $this->render('open_class_dut/ajoutModifEntreprise.html.twig',['vueFormulaireEntreprise' => $vueFormulaire]);
    }

    public function ajouterStage(Request $request, ObjectManager $manager)
    {
        //Création d'une entreprise vierge qui sera remplie par le formulaire
        $newStage = new Stage();
        //Création d'un formulaire permettant de saisir un stage
        $formulaireStage = $this->createForm(StageType::class,$newStage);

        /* On demande au formulaire d'analyser la dernière requete http. Si le tableau POST contenu dans cette requete
        contient des varaibles id,nom activite,adresse,siteWeb,stages alors la méthode handleRequest() 
        récupère les valeurs de ces varialbes et les affecte à l'objet $ressource*/
        $formulaireStage->handleRequest($request);

        if ($formulaireStage->isSubmitted()&& $formulaireStage->isValid()){

            //Enregistrer l'entreprise en base de données
            $manager->persist($newStage);
            $manager->flush();

            //Rediriger l'utilisateur vers la page d'accueil
            return $this->redirectToRoute('proStage');

        }

        // Création de la représentation graphique du formulaire
        $vueFormulaire=$formulaireStage->createView();

        //Afficher le formulaire pour créer une entreprise
        return $this->render('open_class_dut/ajoutModifStage.html.twig',['vueFormulaireStage' => $vueFormulaire]);
    }

    public function modifierEntreprise(Request $request, ObjectManager $manager,Entreprise $entreprise)
    {
        //Création d'un formulaire permettant de saisir une entreprise
        $formulaireEntreprise = $this->createForm(EntrepriseType::class,$entreprise);
        

        /* On demande au formulaire d'analyser la dernière requete http. Si le tableau POST contenu dans cette requete
        contient des varaibles id,nom activite,adresse,siteWeb,stages alors la méthode handleRequest() 
        récupère les valeurs de ces varialbes et les affecte à l'objet $ressource*/
       $formulaireEntreprise->handleRequest($request);

        if ($formulaireEntreprise->isSubmitted()){

            //Enregistrer l'entreprise en base de données
            $manager->persist($entreprise);
            $manager->flush();

            //Rediriger l'utilisateur vers la page d'accueil
            return $this->redirectToRoute('proStage');

        }

        // Création de la représentation graphique du formulaire
        $vueFormulaire=$formulaireEntreprise->createView();

        //Afficher le formulaire pour créer une entreprise
        return $this->render('open_class_dut/ajoutModifEntreprise.html.twig',['vueFormulaireEntreprise' => $vueFormulaire]);
    }

    public function modifierStage(Request $request, ObjectManager $manager,Stage $stages)
    {
        //Création d'un formulaire permettant de saisir un stages
        $formulaireStage = $this->createForm(StageType::class,$stages);
        

        /* On demande au formulaire d'analyser la dernière requete http. Si le tableau POST contenu dans cette requete
        contient des varaibles id,nom activite,adresse,siteWeb,stages alors la méthode handleRequest() 
        récupère les valeurs de ces varialbes et les affecte à l'objet $stages*/
       $formulaireStage->handleRequest($request);

        if ($formulaireStage->isSubmitted()){

            //Enregistrer le stages en base de données
            $manager->persist($stages);
            $manager->flush();

            //Rediriger l'utilisateur vers la page d'accueil
            return $this->redirectToRoute('proStage');

        }

        // Création de la représentation graphique du formulaire
        $vueFormulaire=$formulaireStage->createView();

        //Afficher le formulaire pour créer un stages
        return $this->render('open_class_dut/ajoutModifStage.html.twig',['vueFormulaireStage' => $vueFormulaire]);
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
        $stagesParFormation = $repositoryStage->findStageParFormation($formations);
        //Envoyer les stages récupérées à la vue chargée de les afficher
        return $this->render('open_class_dut/formation_stages.html.twig', ['stagesParFormation' => $stagesParFormation]);
    }


}
