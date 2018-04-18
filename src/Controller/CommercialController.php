<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommercialController extends Controller
{
    /**
     * @Route("/commercial", name="commercial")
     */
    public function index()
    {
        return $this->render('indexCommercial.html.twig', [
            'controller_name' => 'CommercialController',
        ]);
    }
}
