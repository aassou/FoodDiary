<?php
/**
 * Created by PhpStorm.
 * User: abdel
 * Date: 07.11.18
 * Time: 21:49
 */

namespace AppBundle\Entity;


use phpDocumentor\Reflection\Types\Self_;
use Symfony\Component\Form\Exception\LogicException;

class Product
{
    const FOOD_PRODUCT = 'food';

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $type;

    /**
     * @var float
     */
    private $price;

    /**
     * Product constructor.
     * @param $name
     * @param $type
     * @param $price
     */
    public function __construct($name, $type, $price)
    {
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
    }

    /**
     * @return float
     */
    public function calculateVAT()
    {
        if ($this->price < 0) {
            throw new LogicException(sprintf('The VAT of %s can`t be negative', $this->price));
        }

        if (self::FOOD_PRODUCT == $this->type) {
            return $this->price * 0.055;
        }

        return $this->price * 0.196;
    }
}