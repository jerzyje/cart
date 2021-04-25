<?php

declare(strict_types=1);

namespace App\Repository;

use Entity\Cart;

class SessionCartRepository implements CartRepositoryInterface
{
    private const SESSION_KEY = 'jerzy-cart';

    /**
     * @inheritDoc
     */
    public function getCart(): Cart
    {
        // TODO: Implement getCart() method.
    }

    /**
     * @inheritDoc
     */
    public function saveCart(Cart $cart): void
    {
        // TODO: Implement saveCart() method.
    }
}