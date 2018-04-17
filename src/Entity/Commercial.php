<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommercialRepository")
 */

class Commercial{

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
	private $id_com;

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

	public function setId_com($id_com){
		$this->id_com = $id_com;
	}

	public function getId_com(){
		return $this->id_com;
	}
//ajouter les fonction getObjectif, addObjectif, deleteObjectif
}
