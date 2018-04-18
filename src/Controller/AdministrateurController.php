<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdministrateurController extends Controller
{
    /**
     * @Route("/Administrateur", name="Administrateur")
     */
    public function index()
    {
        return $this->render('indexAdministrateur.html.twig', [
            'controller_name' => 'AdministrateurController',
        ]);
    }
}