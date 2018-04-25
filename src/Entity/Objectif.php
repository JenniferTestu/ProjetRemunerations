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
     * @Assert\Type("\DateTime")
     */
	/**
     * @ORM\Column(type="datetime", length=100)
     */
	private $dateDebut;
	/**
     * @Assert\Type("\DateTime")
     */
	/**
     * @ORM\Column(type="datetime", length=100)
     */
	private $dateFin;
	/**
     * @ORM\Column(type="float",nullable=true)
     */
	private $venteAtteinte;
	/**
     * @ORM\Column(type="string",length=100)
     */
	private $type;
	/**
     * @ORM\Column(type="boolean")
     */
	private $proportionnelInf;
	/**
     * @ORM\Column(type="boolean")
     */
	private $proportionnelSup;
	/**
    * @ORM\OneToOne(targetEntity="Prime",cascade={"persist"})
    */
    private $prime;
	/**
     * @ORM\Column(type="float")
     */
	private $recompense;
	/**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="objectifs")
     */
	private $commercial;

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
		$this->dateDebut = new DateTime($dateDebut);
	}

	public function getDateFin(){
		return $this->dateFin;
	}

	public function setDateFin($dateFin){
		$this->dateFin = new DateTime($dateFin);
	}

	public function getVenteAtteinte(){
		return $this->venteAtteinte;
	}

	public function setVenteAtteinte($venteAtteinte){
		$this->venteAtteinte = $venteAtteinte;
	}

	public function getType(){
		return $this->type;
	}

	public function setType($type){
		$this->type = $type;
	}

	public function getProportionnelSup(){
		return $this->proportionnelSup;
	}

	public function setProportionnelSup($proportionnelSup){
		$this->proportionnelSup = $proportionnelSup;
	}

	public function getProportionnelInf(){
		return $this->proportionnelInf;
	}

	public function setProportionnelInf($proportionnelInf){
		$this->proportionnelInf = $proportionnelInf;
	}

	public function getPrime(): ?Prime
    {
        return $this->prime;
    }

    public function setPrime(Prime $prime): self
    {
        $this->prime = $prime;

        return $this;
    }

    public function getRecompense(){
		return $this->recompense;
	}

	public function setRecompense($recompense){
		$this->recompense = $recompense;
	}

	public function getCommercial(): ?User
    {
        return $this->commercial;
    }

    public function setCommercial(?User $commercial): self
    {
        $this->commercial = $commercial;

        return $this;
    }

	// la liste des ventes en parametre correspond a celle d'un commercial et a une certaine periode
	public function calculPrime($ventes){
		
		//$venteAtteinte=0;
		$this->prime = new Prime();

		foreach ($ventes as $v) {

			if ($this->type =="CA"){
				//$v->getCa();
				$this->venteAtteinte+=$v->getCa();
			}

			if ($this->type == "quantite"){
				//$v->getQuantite();
				$this->venteAtteinte+=$v->getQuantite();
			}

		}

		if ($this->proportionnelSup == true && ($this->venteAtteinte > $this->objectif)){
			$r = ($this->recompense / $this->objectif) * $this->venteAtteinte;
			$this->prime->setPrime($r);
		}

		else if ($this->proportionnelInf == true && ($this->venteAtteinte < $this->objectif)){
			$r = ($this->recompense / $this->objectif) * $this->venteAtteinte;
			$this->prime->setPrime($r);
		}

		else if ($this->venteAtteinte >= $this->objectif){
			$r = $this->recompense;
			$this->prime->setPrime($r);
		}

		else{
			$this->prime->setPrime(0);
		}

	}

}