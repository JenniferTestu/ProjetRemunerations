<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class defautController extends Controller{

	/**
    *@Route("/"),name="accueil"
    *@return Response
    */
	public function index(){
		return $this->render('index.html.twig');
	}
}