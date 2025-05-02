<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]

class Cocktail {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
	public ?int $id;

	#[ORM\Column(length: 255)]
	public ?string $name;

	#[ORM\Column(length: 255)]
	public ?string $description;

	#[ORM\Column(length: 255)]
	public ?string $ingredients;

	#[ORM\Column(length: 255)]
	public ?string $image;

	#[ORM\Column]
	public DateTime $createdAt;

	#[ORM\Column]
	public bool $isPublished;


	public function __construct($name, $description, $ingredients, $image) {

		$this->name = $name;
		$this->description = $description;
		$this->ingredients = $ingredients;
		$this->image = $image;

		$this->createdAt = new \DateTime();
		$this->isPublished = true;

		$this->id = 5;
	}

}