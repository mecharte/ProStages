<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class OpenClassDutController extends AbstractController
{
   /**
    * @Route("/accueil", name="open_class_dut")
    */
    public function index()
    {
        return $this->render('open_class_dut/index.html.twig', [
            'controller_name' => 'ControleurOpenClassDut',
        ]);
    }
    
    /**
    * @Route("/accueil", name="open_class_dut")
    */
    public function index()
    {
        return $this->render('open_class_dut/entreprises.html.twig', [
            'controller_name' => 'ControleurOpenClassDut',
        ]);
    }

}
