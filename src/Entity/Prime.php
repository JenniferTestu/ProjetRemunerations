<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PrimeRepository")
 */

class Prime
{
	/**
     * @ORM\GeneratedValue
     * @ORM\Column(type="float")
     */
	private $prime;

	public function getPrime(){
		return $this->prime;
	}

	public function setPrime($prime){
		$this->prime = $prime;
	}
}