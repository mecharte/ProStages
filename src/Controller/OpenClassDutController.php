<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class OpenClassDutController extends AbstractController
{
   #/**
   # * @Route("/accueil", name="open_class_dut")
   # */
    public function index()
    {
        return $this->render('open_class_dut/index.html.twig', [
            'controller_name' => 'ControleurOpenClassDut',
        ]);
    }

    public function index2()
    {
        return $this->render('open_class_dut/entreprises.html.twig', [
            'controller_name' => 'entreprises',
        ]);
    }

    public function index3()
    {
        return $this->render('open_class_dut/formation.html.twig', [
            'controller_name' => 'ControleurOpenClassDut',
        ]);
    }
    
    public function index4($id)
    {
        return $this->render('open_class_dut/stages.html.twig', [
            'StageID' => $id,
        ]);
    }

    public function afficherRessourcesPeda($nb)
    {
        return $this->render('open_class_dut/affichagesRessources.html.twig', [
            'afficherRessourceNB' => $nb,
        ]);
    }
}
