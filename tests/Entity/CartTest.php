<?php

namespace App\Tests\Entity;

use App\Entity\Cart;
use App\Entity\CartItem;
use App\Entity\CartItemInterface;
use App\Entity\Product;
use App\Exception\CartItemNotFoundException;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{

    public function testGetItem()
    {
        $cart = (new Cart())->addItem(new CartItem());
        $item = $cart->getItem(1);
        $this->assertInstanceOf(CartItemInterface::class, $item);
    }

    public function testGetItemException()
    {
        $nonExistingItem = 5;
        $this->expectException(CartItemNotFoundException::class);
        $this->expectExceptionMessage('Item with id ' . $nonExistingItem . ' not found in cart');
        $cart = (new Cart())->addItem(new CartItem());
        $cart->getItem($nonExistingItem);
    }

    public function testAddItem()
    {
        $cart = (new Cart())->addItem(new CartItem());

        $this->assertCount(1, $cart->getItems());
        $this->assertSame(1, $cart->getItems()[0]->getId());
    }

    public function testClear()
    {
        $cart = (new Cart())
            ->addItem(new CartItem())
            ->addItem(new CartItem());

        $this->assertCount(0, $cart->clear()->getItems());
    }

    public function testRemoveItem()
    {
        $cart = (new Cart())
            ->addItem(new CartItem())
            ->addItem(new CartItem())
            ->addItem(new CartItem())
            ->addItem(new CartItem());

        $cart->removeItem(2);
        $this->assertCount(3, $cart->getItems());
    }

    public function testGetItemByType()
    {
        $product = (new Product())
            ->setType('some_type');
        $cartItem = (new CartItem())
            ->setProduct($product);
        $cart = (new Cart())
            ->addItem($cartItem);

        $this->assertInstanceOf(CartItemInterface::class, $cart->getItemByType('some_type'));
    }

    public function testGetItems()
    {
        $cart = (new Cart())
            ->addItem(new CartItem())
            ->addItem(new CartItem());

        $this->assertCount(2, $cart->getItems());
    }
}
