<?php
namespace App\tests\entity;

use App\Entity\Product;
use PHPUnit\Framework\TestCase;

/**
 * @dataProvider pricesForFood
 */
class ProductTest extends TestCase {

    public function testProduct() {
        $product = new Product('pomme', 'food', 1);
        $this->assertSame(0.055, $product->computTVA());
    } 

    public function testProduct2() {
        $product = new Product('jus', 'drink', 1);
        $this->assertSame(0.196, $product->computTVA());
    } 

    public function testMultiFood($prix, $tva) {
        $p = new Product("pomme", "food", $prix);
        $this->assertSame($tva, $p->computeTVA());
    }

    public function pricesForFood() {
        return [
            [1, 0.055],
            [2, 0.11],
            [3, 0.165],
            [4, 0.22],
        ];
    }
}
