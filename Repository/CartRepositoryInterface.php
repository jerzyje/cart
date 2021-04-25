<?php

declare(strict_types=1);

namespace App\Repository;

use Entity\Cart;

interface CartRepositoryInterface
{
    /**
     * @return Cart
     */
    public function getCart(): Cart;

    /**
     * @param Cart $cart
     */
    public function saveCart(Cart $cart): void;
}
