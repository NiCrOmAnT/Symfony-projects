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
}
