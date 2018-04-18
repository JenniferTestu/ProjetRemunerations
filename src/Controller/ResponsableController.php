<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ResponsableController extends Controller
{
    /**
     * @Route("/responsable", name="responsable")
     */
    public function index()
    {
        return $this->render('indexResponsable.html.twig', [
            'controller_name' => 'ResponsableController',
        ]);
    }
}
