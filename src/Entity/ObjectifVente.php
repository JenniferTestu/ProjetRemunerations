<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ObjectifVenteRepository")
 */
class ObjectifVente implements Objectif
{
	/**
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
	private $objectif;
	/**
     * @ORM\GeneratedValue
     * @ORM\Column(type="string",length=255)
     */
	private $dateDebut;
	/**
     * @ORM\GeneratedValue
     * @ORM\Column(type="string",length=255)
     */
	private $dateFin;
	/**
     * @ORM\GeneratedValue
     * @ORM\Column(type="float")
     */
	private $venteAtteinte;

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