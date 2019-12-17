<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Formation;
use App\Entity\Entreprise;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Création d'un générateur de donnée avec FAKER
        $faker = \Faker\Factory::create('fr_FR');
        // Création de donnée en dure
        $Formation_DUT_Informatique = new Formation();
        $Formation_DUT_Informatique->setNomLong("Diplome Universitaire et Technologique en Informatique");
        $Formation_DUT_Informatique->setNomCourt("DUT_INFO");
        $manager->persist($Formation_DUT_Informatique);

        $Formation_Licence_Professionnel_Multimedia = new Formation();
        $Formation_Licence_Professionnel_Multimedia->setNomLong("Licence professionnel multimédia");
        $Formation_Licence_Professionnel_Multimedia->setNomCourt("LP Multimédia");
        $manager->persist($Formation_Licence_Professionnel_Multimedia);

        $Formation_DU_TIC = new Formation();
        $Formation_DU_TIC->setNomLong("Diplome Universitaire en Technologies de l'Information et de la Communication");
        $Formation_DU_TIC->setNomCourt("DU TIC");
        $manager->persist($Formation_DU_TIC);

        // Création de donnée avec FAKER
        $nbEntreprises = 15;
        for($i=1;$i <= $nbEntreprises;$i++){
            $Entreprise_1= new Entreprise();
            $Entreprise_1->setNom($faker->realText($maxNbChars = 200, $indexSize = 2));
            $Entreprise_1->setActivite($faker->regexify('Bonjour[A-Z],[A-Z]{1,45}'));
            $Entreprise_1->setAdresse($faker->address);
            $Entreprise_1->setSiteWeb($faker->url);
            $manager->persist($Entreprise_1);
        }
        

        //Envoyer les données en BD
        $manager->flush();

    }
}
