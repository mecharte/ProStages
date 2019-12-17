<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Formation;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
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

        $manager->flush();
    }
}
