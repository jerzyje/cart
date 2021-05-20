<?php

declare(strict_types=1);

namespace Repository;

use Entity\CartInterface;

interface CartRepositoryInterface
{
    /**
     * @return CartInterface
     */
    public function getCart(): CartInterface;

    /**
     * @param CartInterface $cart
     */
    public function saveCart(CartInterface $cart): void;
}
