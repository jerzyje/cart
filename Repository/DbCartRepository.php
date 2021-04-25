<?php

declare(strict_types=1);

namespace App\Repository;

use Entity\Cart;

class DbCartRepository implements CartRepositoryInterface
{

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