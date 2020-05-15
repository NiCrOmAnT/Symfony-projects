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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPizza(): ?string
    {
        return $this->pizza;
    }

    public function setPizza(string $pizza): self
    {
        $this->pizza = $pizza;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
