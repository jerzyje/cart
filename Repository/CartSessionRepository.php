<?php

declare(strict_types=1);

namespace Repository;

use Entity\Cart;
use Entity\CartInterface;

class CartSessionRepository implements CartRepositoryInterface
{
    const CART_NAME = 'jerzyje-cart';

    public function __construct()
    {
        session_start();
    }

    public function getCart(): CartInterface
    {
        if (!isset($_SESSION[self::CART_NAME])) {
            return new Cart();
        }

        $normalizedCart = $_SESSION[self::CART_NAME];

        /** @var CartInterface $cart*/
        $cart = unserialize($normalizedCart);

        return $cart;
    }

    public function saveCart(CartInterface $cart): void
    {
        $_SESSION[self::CART_NAME] = serialize($cart);
    }
}