<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EspaceController extends Controller
{
    /**
     * @Route("/espace", name="espace")
     */
    public function index()
    {
	    $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
	    $user = $this->getUser();
	    $idUser = $user->getId();
	    $repository = $this->getDoctrine()->getRepository('App:User');
	    $type=$repository->getType($idUser);

	    if($type==("Commercial")){
	        return $this->render('indexCommercial.html.twig');
	    }
	    else if ($type==("Responsable")){
	        return $this->render('indexResponsable.html.twig');
	    }
	    else{
        	return $this->render('indexAdministrateur.html.twig');
    	}
    }
}
