<?php

declare(strict_types=1);

namespace Repository;

use Entity\Cart;

class CartSessionRepository implements CartRepositoryInterface
{
    const CART_NAME = 'jerzyje-cart';

    public function __construct()
    {
        session_start();
    }

    public function getCart(): Cart
    {
        if (!isset($_SESSION[self::CART_NAME])) {
            return new Cart();
        }

        $normalizedCart = $_SESSION[self::CART_NAME];

        /** @var Cart $cart*/
        $cart = unserialize($normalizedCart);

        return $cart;
    }

    public function saveCart(Cart $cart): void
    {
        $_SESSION[self::CART_NAME] = serialize($cart);
    }
}