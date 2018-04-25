<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListeObjectifsController extends Controller
{
    /**
     * @Route("/listeobjectifs", name="listeobjectifs")
     */
    public function listeObjectifs()
    {
    	$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        $idUser = $user->getId();
        $repository = $this->getDoctrine()->getRepository('App:Objectif');
        $liste=$repository->findAll();
        return $this->render('listeObjectifs.html.twig',array('liste'=>$liste));
    }
}
