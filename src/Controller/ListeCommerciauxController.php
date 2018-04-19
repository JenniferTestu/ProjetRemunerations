<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListeCommerciauxController extends Controller
{
    /**
     * @Route("/listecommerciaux", name="listecommerciaux")
     */
    public function listecommerciaux()
    {

    	$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        $idUser = $user->getId();
        $repository = $this->getDoctrine()->getRepository('App:User');
        $liste=$repository->findByType("Commercial");
        return $this->render('listeCommerciaux.html.twig',array('liste'=>$liste));
    }
}
