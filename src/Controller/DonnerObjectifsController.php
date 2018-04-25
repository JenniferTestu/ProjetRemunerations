<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use App\Entity\Objectif;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; 
use App\Repository\UserRepository;

class DonnerObjectifsController extends Controller
{
    /**
     * @Route("/donnerobjectifs", name="donnerobjectifs")
     */
    public function donnerObjectifs(Request $request)
    {

		$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        $idUser = $user->getId();
    	$entityManager = $this->getDoctrine()->getManager();
        $objectif = new Objectif();
        $form = $this->createFormBuilder($objectif)
         ->add('objectif',TextType::class)
         ->add('recompense',TextType::class)
         ->add('proportionnelInf', ChoiceType::class, array(
    	'choices'  => array(
        'Oui' => true,
        'Non' => false)))
         ->add('type', ChoiceType::class, array(
    	'choices'  => array(
        'En quantité' => "quantite",
        'En chiffre d affaire' => "CA")))
     	 ->add('proportionnelSup',ChoiceType::class, array(
    	'choices'  => array(
        'Oui' => true,
        'Non' => false)))
         ->add('commercial', EntityType::class, array(
        'class' => 'App\Entity\User',
        'query_builder' => function (UserRepository $er) use ($idUser){
            return $er->createQueryBuilder('u')
                ->where('u.responsable = :id')
                ->setParameter('id', $idUser)
                ->orderBy('u.nom', 'ASC');
        },
        'choice_label' => 'nom'
        ))
         ->add('dateDebut',TextType::class)
         ->add('dateFin',TextType::class)
     	 ->add('Valider', SubmitType::class, array('label' => 'Enregistrer'))
     	 ->getForm();

     	 $form->handleRequest($request);

     	 if ($form->isSubmitted() && $form->isValid()) {
     	 	$objectif = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($objectif);
            $entityManager->flush();
            return $this->redirectToRoute('donnerobjectifs');
    	}

        return $this->render('donnerObjectifs.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
