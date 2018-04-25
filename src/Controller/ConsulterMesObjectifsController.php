<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConsulterMesObjectifsController extends Controller
{
    /**
     * @Route("/consultermesobjectifs", name="consultermesobjectifs")
     */
    public function consulterMesObjectifs()
    {
    	$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        $idUser = $user->getId();
        //$repository = $this->getDoctrine()->getRepository('App:Objectif');
        //$liste=$repository->findByCommercial($user);
        $liste=$user->getObjectifs();
        return $this->render('consulterMesObjectifs.html.twig',array('liste'=>$liste));
    }
}
