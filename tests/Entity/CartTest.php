<?php

namespace App\Tests\Entity;

use App\Entity\Cart;
use App\Entity\CartItem;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{

    public function testGetItem()
    {

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

    }

    public function testGetItemByType()
    {

    }

    public function testGetItems()
    {
        $cart = (new Cart())
            ->addItem(new CartItem())
            ->addItem(new CartItem());

        $this->assertCount(2, $cart->getItems());
    }
}
