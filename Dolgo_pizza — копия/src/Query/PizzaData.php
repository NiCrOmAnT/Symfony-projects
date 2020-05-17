<?php

use Symfony\Component\Validator\Constraints as Assert;

namespace App\Query;

class PizzaData
{
    /**
     * @Assert\NotBlank()
     * @var int
     */
    private $id;
    
    /**
     * @Assert\NotBlank()
     * @var string
     */
    private $name;

    /**
     * @Assert\NotBlank()
     * @var string
     */
    private $about;

    /**
     * @Assert\NotBlank()
     * @var int
     */
    private $price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAbout(): ?string
    {
        return $this->about;
    }

    public function setAbout(string $about): void
    {
        $this->about = $about;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }
}
