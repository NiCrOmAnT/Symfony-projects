<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];



    public function getId(): ?int
    {
        return $this->id;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

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

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(): self
    {
        $this->username = $this->email;

        return $this;
    }

    public function setRoleAdmin()
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_ADMIN';

        return array_unique($roles);
    }

    public function setRole(string $role): self
    {
        $this->roles[] = $role;

        return $this;
    }

    public function getRoles()
    {
        $roles = $this->roles;

        return array_unique($roles);
    }

    public function getSalt() {}

    public function eraseCredentials() {}

    public function serialize()
    {
        return serialize([
            $this->id,
            $this->email,
            $this->password,
            $this->address,
            $this->name,
            $this->username
        ]);
    }

    public function unserialize($string)
    {
        list (
            $this->id,
            $this->email,
            $this->password,
            $this->address,
            $this->name,
            $this->username
        ) = unserialize($string, ['allowed_classes' => false]);
            
    }
}
