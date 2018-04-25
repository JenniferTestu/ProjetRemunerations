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


        return $this->render('consulterObjectifsAttribues.html.twig',array('liste'=>$liste));
    }
}
