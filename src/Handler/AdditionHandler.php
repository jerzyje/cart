<?php

declare(strict_types=1);

namespace App\Handler;

use App\Entity\CartInterface;
use App\Entity\CartItemInterface;

final class AdditionHandler extends AbstractHandler
{
    public function handle(CartInterface $cart, CartItemInterface $item): CartInterface
    {
        $cart->addItem($item);

        return parent::handle($cart, $item);
    }
}
