<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Formation;
use App\Entity\Entreprise;
use App\Entity\Stage;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Création d'un générateur de donnée avec FAKER
        $faker = \Faker\Factory::create('fr_FR');

         
        //CREATION DES FORMATIONS ET DES STAGES ASSOCIES 
    
        $listeFormations = array(
        "DUT Informatique" => "DUT INFO" ,
        "Licence professionnel Multimédia" => "Licence Pro" ,
        "Diplome Universitaire en Technologies de l'Information et de la Communication" => "DU TIC"
        );

      foreach ($listeFormations as $nomCourt => $nomLong) {
        //Création d'une formation
        $formation = new Formation();
        // Définition du nom court de la formation
        $formation->setNomCourt($nomCourt);
        // Définition du nom (long) de la formation
        $formation->setNomLong($nomLong);
        $manager->persist($formation);

        // Création de donnée en dure
       /* 
        $Formation_Licence_Professionnel_Multimedia = new Formation();
        $Formation_Licence_Professionnel_Multimedia->setNomLong("Licence professionnel multimédia");
        $Formation_Licence_Professionnel_Multimedia->setNomCourt("LP Multimédia");
        $manager->persist($Formation_Licence_Professionnel_Multimedia);

        $Formation_DU_TIC = new Formation();
        $Formation_DU_TIC->setNomLong("Diplome Universitaire en Technologies de l'Information et de la Communication");
        $Formation_DU_TIC->setNomCourt("DU TIC");
        $manager->persist($Formation_DU_TIC);

         //Création du tableau
         //$tabFormation=array($Formation_DU_TIC,$Formation_Licence_Professionnel_Multimedia,$Formation_DUT_Informatique);
        //Persiste de mes données du tabEntreprise
        foreach($tabFormation as $typeFormation){
            $manager->persist($typeFormation);
        }*/

        /*// Création de donnée avec FAKER
        $nbEntreprises = 15;
        for($i=1;$i <= $nbEntreprises;$i++){
            $Entreprise= new Entreprise();
            $Entreprise->setNom($faker->realText($maxNbChars = 200, $indexSize = 2));
            $Entreprise->setActivite($faker->regexify('Bonjour[A-Z],[A-Z]{1,45}'));
            $Entreprise->setAdresse($faker->address);
            $Entreprise->setSiteWeb($faker->url);
            $manager->persist($Entreprise);
        }
        */

            $Entreprise_SAFRAN= new Entreprise();
            $Entreprise_SAFRAN->setNom("SAFRAN");
            $Entreprise_SAFRAN->setActivite($faker->realText($maxNbChars = 200, $indexSize = 2));
            $Entreprise_SAFRAN->setAdresse($faker->address);
            $Entreprise_SAFRAN->setSiteWeb("Safran.com");
            

            $Entreprise_ALTANOVEO= new Entreprise();
            $Entreprise_ALTANOVEO->setNom("ALTANOVEO");
            $Entreprise_ALTANOVEO->setActivite($faker->realText($maxNbChars = 200, $indexSize = 2));
            $Entreprise_ALTANOVEO->setAdresse($faker->address);
            $Entreprise_ALTANOVEO->setSiteWeb("Altanoveo.com");
            

            $Entreprise_THALES= new Entreprise();
            $Entreprise_THALES->setNom("THALES");
            $Entreprise_THALES->setActivite($faker->realText($maxNbChars = 200, $indexSize = 2));
            $Entreprise_THALES->setAdresse($faker->address);
            $Entreprise_THALES->setSiteWeb("Thales.com");
            

            $Entreprise_BIOLUZ= new Entreprise();
            $Entreprise_BIOLUZ->setNom("BIOLUZ");
            $Entreprise_BIOLUZ->setActivite($faker->realText($maxNbChars = 200, $indexSize = 2));
            $Entreprise_BIOLUZ->setAdresse($faker->address);
            $Entreprise_BIOLUZ->setSiteWeb("Bioluz.com");
            

            $Entreprise_QUIKSILVER= new Entreprise();
            $Entreprise_QUIKSILVER->setNom("QUIKSILVER");
            $Entreprise_QUIKSILVER->setActivite($faker->realText($maxNbChars = 200, $indexSize = 2));
            $Entreprise_QUIKSILVER->setAdresse($faker->address);
            $Entreprise_QUIKSILVER->setSiteWeb("Quiksilver.com");
            

            $Entreprise_POLYCLINIQUE= new Entreprise();
            $Entreprise_POLYCLINIQUE->setNom("POLYCLINIQUE");
            $Entreprise_POLYCLINIQUE->setActivite($faker->realText($maxNbChars = 200, $indexSize = 2));
            $Entreprise_POLYCLINIQUE->setAdresse($faker->address);
            $Entreprise_POLYCLINIQUE->setSiteWeb("Polyclinique.com");
            

            $Entreprise_CAPGEMINI= new Entreprise();
            $Entreprise_CAPGEMINI->setNom("CAPGEMINI");
            $Entreprise_CAPGEMINI->setActivite($faker->realText($maxNbChars = 200, $indexSize = 2));
            $Entreprise_CAPGEMINI->setAdresse($faker->address);
            $Entreprise_CAPGEMINI->setSiteWeb("Capgemini.com");
            

            $Entreprise_TATTOO= new Entreprise();
            $Entreprise_TATTOO->setNom("TATTOO");
            $Entreprise_TATTOO->setActivite($faker->realText($maxNbChars = 200, $indexSize = 2));
            $Entreprise_TATTOO->setAdresse($faker->address);
            $Entreprise_TATTOO->setSiteWeb("Tattoo.com");
            

            $Entreprise_APPLE= new Entreprise();
            $Entreprise_APPLE->setNom("APPLE");
            $Entreprise_APPLE->setActivite($faker->realText($maxNbChars = 200, $indexSize = 2));
            $Entreprise_APPLE->setAdresse($faker->address);
            $Entreprise_APPLE->setSiteWeb("Apple.com");
            

            $Entreprise_MCDONALD= new Entreprise();
            $Entreprise_MCDONALD->setNom("MC DONALDS");
            $Entreprise_MCDONALD->setActivite($faker->realText($maxNbChars = 200, $indexSize = 2));
            $Entreprise_MCDONALD->setAdresse($faker->address);
            $Entreprise_MCDONALD->setSiteWeb("Mcdonalds.com");
            
            
            //Création du tableau
            $tabEntreprise=array($Entreprise_ALTANOVEO,$Entreprise_APPLE,$Entreprise_BIOLUZ,$Entreprise_MCDONALD,$Entreprise_POLYCLINIQUE,
                                $Entreprise_QUIKSILVER,$Entreprise_SAFRAN,$Entreprise_TATTOO,$Entreprise_THALES,$Entreprise_CAPGEMINI);

            //Persiste de mes données du tabEntreprise
            foreach($tabEntreprise as $typeEntreprise){
                $manager->persist($typeEntreprise);
            }

            //Création des stages --> Formation
            $nbStagesAGenerer = $faker->numberBetween($min = 0, $max = 10);
        for($i=1;$i <= $nbStagesAGenerer;$i++){
            $Stages= new Stage();
            $Stages->setTitre("Stage - ".$faker->jobTitle);
            $Stages->setDescription($faker->realText($maxNbChars = 200, $indexSize = 2));
            $Stages->setEmail($faker->email);
            // Selectionne une formation au hazard pour la lier
            $Stages -> addFormation($formation);

            // Sélectionner une entreprise au hasard parmi les 9 créées dans $tabEntreprise
            $choisirUneEntreprise = $faker->numberBetween($min = 0, $max = 9);
            // Création relation un Stage --> une Entreprise
            $Stages -> setNomEntreprise($tabEntreprise[$choisirUneEntreprise]);
            // Création relation une Entreprise --> des Stages
            $tabEntreprise[$choisirUneEntreprise] -> addStage($Stages);
            // Persister les objets modifiés
            $manager->persist($Stages);
            $manager->persist($tabEntreprise[$choisirUneEntreprise]);
        }
    }
    //Envoyer les données en BD
    $manager->flush();
    }
}
