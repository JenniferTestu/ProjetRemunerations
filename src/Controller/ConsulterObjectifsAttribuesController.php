<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConsulterObjectifsAttribuesController extends Controller
{
    /**
     * @Route("/consulterobjectifsattribues", name="consulterobjectifsattribues")
     */
    public function consulterObjectifsAttribues()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        $idUser = $user->getId();

		$repository = $this->getDoctrine()->getRepository('App:User');
        $equipe=$repository->findCommercialByResponsable($user);
        
        $repository2 = $this->getDoctrine()->getRepository('App:Objectif');
        $liste=array();

        foreach ($equipe as $e) {
        	$r = $repository2->findByCommercial($e);
        	$liste = array_merge($liste, $r);
        }

        return $this->render('consulterObjectifsAttribues.html.twig',array('liste'=>$liste));
    }
}
