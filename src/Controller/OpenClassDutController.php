<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class OpenClassDutController extends AbstractController
{
    /**
     * @Route("/open/class/dut", name="open_class_dut")
     */
    public function index()
    {
        return $this->render('open_class_dut/index.html.twig', [
            'controller_name' => 'OpenClassDutController',
        ]);
    }
}
