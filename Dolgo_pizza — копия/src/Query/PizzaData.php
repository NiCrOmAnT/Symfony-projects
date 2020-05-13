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
}
