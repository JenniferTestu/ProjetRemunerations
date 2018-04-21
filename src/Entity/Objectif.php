<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use \DateTime;

/**
 * @ORM\Table(name="objectif")
 * @ORM\Entity(repositoryClass="App\Repository\ObjectifRepository")
 */
class Objectif
{
	
	/**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
	/**
     * @ORM\Column(type="integer")
     */
	private $objectif;
	/**
     * @Assert\DateTime()
     */
	/**
     * @ORM\Column(type="datetime", length=100)
     */
	private $dateDebut;
	/**
     * @Assert\DateTime()
     */
	/**
     * @ORM\Column(type="datetime", length=100)
     */
	private $dateFin;
	/**
     * @ORM\Column(type="float")
     */
	private $venteAtteinte;


	public function getId(){
        return $this->id;
    }

	public function getObjectif(){
		return $this->objectif;
	}

	public function setObjectif($objectif){
		$this->objectif = $objectif;
	}

	public function getDateDebut(){
		return $this->dateDebut;
	}

	public function setDateDebut($dateDebut){
		$this->dateDebut = $dateDebut;
	}

	public function getDateFin(){
		return $this->dateFin;
	}

	public function setDateFin($dateFin){
		$this->dateFin = $dateFin;
	}

	public function getVenteAtteinte(){
		return $this->venteAtteinte;
	}

	public function setVenteAtteinte($venteAtteinte){
		$this->venteAtteinte = $venteAtteinte;
	}

	public function calculPrime(){
		return null;
	}

}