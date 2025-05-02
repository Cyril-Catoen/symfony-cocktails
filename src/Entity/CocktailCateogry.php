<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]

class CocktailCategory {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
	public ?int $id;

	#[ORM\Column(length: 255)]
	public ?string $name;

    #[ORM\Column]
	public DateTime $createdAt;

	#[ORM\Column(length: 255)]
	public ?string $description;

	public function __construct($name, $description, $ingredients, $image) {

		$this->name = $name;
		$this->description = $description;
		$this->createdAt = new \DateTime();


	}

}