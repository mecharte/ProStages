<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class OpenClassDutController extends AbstractController
{
    
    public function index()
    {
        return $this->render('open_class_dut/index.html.twig', [
            'controller_name' => 'ControleurOpenClassDut',
        ]);
    }
}
