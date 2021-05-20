<?php

declare(strict_types=1);

namespace Handler;

use Entity\CartInterface;
use Entity\CartItemInterface;

final class AdditionHandler extends AbstractHandler
{
    public function handle(CartInterface $cart, CartItemInterface $item): CartInterface
    {
        $cart->addItem($item);

        return parent::handle($cart, $item);
    }
}
