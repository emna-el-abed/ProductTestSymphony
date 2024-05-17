<?php
namespace App\Tests\Entity;
use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /** 
   * @dataProvider pricesForFoodProduct 
   */ 
    public function testcomputeTVAFoodProduct($price, $expectedTva)
    {
        $product = new Product('Pomme', 'food', $price);
        $this->assertSame($expectedTva, $product->computeTVA());
    }
 
    public function pricesForFoodProduct()
    { 
        return [[0, 0.0],[20, 1.1],[100, 5.5]]; 
    } 

    public function testFood()
    {
        $product = new Product('Pomme', 'emna', 22);
        $this->assertSame(4.312, $product->computeTVA()); 
    }

    public function testNegativePriceComputeTVA()
    { 
        $product = new Product('Un produit', 'food', -20); 
        $this->expectException('Exception'); 
        $product->computeTVA(); 
    }

     public function testDefault()
    {
        $product = new Product('Pomme', 'food', 1);
        $this->assertSame(0.055, $product->computeTVA());
    } 
}
?>
