<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdministrateurRepository")
 */
class Administrateur
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
    private $id_admin;

    public function setnom($nom){
        $this->nom = $nom;
    }

    public function getnom(){
        return $this->nom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function setId_admin($id_admin){
        $this->id_admin = $id_admin;
    }

    public function getId_admin(){
        return $this->id_admin;
    }

}
