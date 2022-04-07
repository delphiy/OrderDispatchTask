<?php
namespace OrderDispatchSystem\models;

/**
 * Class Consignment
 * @package OrderDispatchSystem\models
 */
class Consignment
{
    /**
     * @var
     */
    public $products;
    /**
     * @var
     */
    public $courierID;
    /**
     * @var int
     */
    public $id;

    /**
     * Consignment constructor.
     */
    function __construct() {
        $this->id = rand(1, 100);;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}