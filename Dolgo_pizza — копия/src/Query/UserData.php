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
}
