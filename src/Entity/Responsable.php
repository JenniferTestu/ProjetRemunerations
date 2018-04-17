<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResponsableRepository")
 */
class Responsable
{
	/**
     * @ORM\GeneratedValue
     * @ORM\Column(type="string",length=255)
     */
	private $nom;
	/**
     * @ORM\GeneratedValue
     * @ORM\Column(type="string",length=255)
     */
	private $prenom;
	/**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
	private $id_resp;

	public function setNom($nom){
		$this->nom = $nom;
	}

	public function getNom(){
		return $this->nom;
	}

	public function setPrenom($prenom){
		$this->prenom = $prenom;
	}

	public function getPrenom(){
		return $this->prenom;
	}

	public function setId_resp($id_resp){
		$this->id_resp = $id_resp;
	}

	public function getId_resp(){
		return $this->id_resp;
	}

	//ajouter les getEquipe et setEquipe avec les array Commercial

}
