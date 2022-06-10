<?php
/* tests/CartTest.php */
namespace App\Tests;
use App\Cart;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Cart.php';


class CartTest extends TestCase
{
    public function testCart()
    {
        $cart = new Cart();

        // Test 1
        $quantities = [
            1, 0, 0, 0, 0, 0,
        ];
        $cart->updateQuantities($quantities);
        $this->assertEquals(199, $cart->getTotal());

        // Test 2
        $quantities = [
            1, 0, 0, 2, 0, 0,
        ];
        $cart->updateQuantities($quantities);
        $this->assertEquals(797, $cart->getTotal());

        // Test 3
        $products = $cart->getProducts();
        $this->assertEquals(6, count($products));
        $this->assertEquals(2, $products[3]['quantity']);
        
         // Test 4
        $this->assertEquals(['products', 'total'], $cart->__sleep());
    }
}
