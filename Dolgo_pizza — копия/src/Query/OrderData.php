<?php

use Symfony\Component\Validator\Constraints as Assert;

namespace App\Query;

class OrderData
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
    private $pizza;

    /**
     * @Assert\NotBlank()
     * @var int
     */
    private $price;

    /**
     * @Assert\NotBlank()
     * @var string
     */

    private $name;

     /**
     * @Assert\NotBlank()
     * @var string
     */
    private $address;

     /**
     * @Assert\NotBlank()
     * @var string
     */
    private $status;

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPizza(): ?string
    {
        return $this->pizza;
    }

    public function setPizza(string $pizza): void
    {
        $this->pizza = $pizza;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
}
