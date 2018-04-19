<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;


class RegisterController extends Controller
{
    /**
     * @Route("/register", name="register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {

    	$entityManager = $this->getDoctrine()->getManager();
        $user = new user();
        $form = $this->createFormBuilder($user)
         ->add('nom',TextType::class)
      	 ->add('prenom', TextType::class)
     	 ->add('email',EmailType::class)
     	 ->add('password',PasswordType::class)
     	 ->add('type',ChoiceType::class, array(
    	'choices'  => array(
        'Commercial' => "Commercial",
        'Responsable' => "Responsable",
        'Administrateur' => "Administrateur")))
     	 ->add('Valider', SubmitType::class, array('label' => 'Enregistrer'))
     	 ->getForm();

     	 $form->handleRequest($request);

     	 if ($form->isSubmitted() && $form->isValid()) {
     	 	$user = $form->getData();
            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('login');
    	}

        return $this->render('register.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
