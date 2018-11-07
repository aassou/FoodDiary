<?php
/**
 * Created by PhpStorm.
 * User: abdel
 * Date: 07.11.18
 * Time: 21:53
 */

namespace Tests\AppBundle\Entity;


use AppBundle\Entity\Product;
use PHPUnit\Framework\TestCase;

/**
 * Class ProductTest
 * @package Tests\AppBundle\Entity
 */
class ProductTest extends TestCase
{
    /**
     *
     */
    public function testCalculateVATProductTypeFood()
    {
        $product = new Product('banana', Product::FOOD_PRODUCT, 10);
        $result = $product->calculateVAT();

        $this->assertSame(0.55, $result);
    }

    /**
     *
     */
    public function testCalculateVAT()
    {
        $product = new Product('mouse', 'electronics', 100);
        $result = $product->calculateVAT();

        $this->assertSame(19.6, $result);
    }

    /**
     *
     */
    public function testNegativePriceCalculateVAT()
    {
        $product = new Product('rice', Product::FOOD_PRODUCT, -10);

        $this->expectException('LogicException');

        $product->calculateVAT();
    }
}