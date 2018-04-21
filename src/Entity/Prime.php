<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="prime")
 * @ORM\Entity(repositoryClass="App\Repository\PrimeRepository")
 */
class Prime
{
	/**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
	/**
     * @ORM\Column(type="float")
     */
	private $prime;

	public function getId(){
        return $this->id;
    }

	public function getPrime(){
		return $this->prime;
	}

	public function setPrime($prime){
		$this->prime = $prime;
	}
}