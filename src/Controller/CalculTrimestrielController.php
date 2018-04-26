<?php

namespace App\Controller;

use Symfony\Bridge\Doctrine\Form\Type\EntityType; 
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\ObjectifRepository;
use App\Repository\VenteRepository;
use App\Entity\Objectif;
use App\Entity\Vente;
use App\Entity\Prime;
use App\Entity\User;

class CalculTrimestrielController extends Controller
{
    /**
     * @Route("/calcultrimestriel", name="calcultrimestriel")
     */
    public function calculTrimestriel()
    {

    	$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return $this->render('calculTrimestriel.html.twig', [
            'controller_name' => 'CalculTrimestrielController',
        ]);
    }

    /**
     * @Route("/lancementcalcul", name="lancementcalcul")
     */
    public function lancementCalcul(Request $request)
    {
    	$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
		$objectifs = $this->getDoctrine()->getRepository(Objectif::class)->findByDate(new \DateTime('now'));
        $i=0;

		foreach ($objectifs as $o) {
			$commercial= $o->getCommercial();
			$dateD= $o->getDateDebut();
			$dateF= $o->getDateFin();
			$em = $this->getDoctrine()->getManager();

			$ventes = $em->getRepository('App:Vente')->findByCommercialAndDates($commercial,$dateD,$dateF);
			$o->calculPrime($ventes);

			$prime = $o->getPrime();
			$em->persist($prime);
			$em->persist($o);
       		$em->flush();
       		$i++;
		}

		return new Response('Les calculs ont été fait : '.$i.'sur'.sizeof($objectifs));
    }
}
