<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="responsable")
 * @ORM\Entity(repositoryClass="App\Repository\ResponsableRepository")
 */
class Responsable extends User
{
	
	//ajouter les getEquipe et setEquipe avec les array Commercial

}
