<?php

use Symfony\Component\Validator\Constraints as Assert;

namespace App\Query;

class UserData
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
    private $email;

    /**
     * @Assert\NotBlank()
     * @var string
     */
    private $password;

    /**
     * @Assert\NotBlank()
     * @var string
     */
    private $address;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }
}
