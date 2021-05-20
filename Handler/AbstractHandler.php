<?php

declare(strict_types=1);

namespace Handler;

use Entity\CartInterface;
use Entity\CartItemInterface;

abstract class AbstractHandler
{
    private AbstractHandler $next;

    public function addNext(AbstractHandler $next): AbstractHandler
    {
        $this->next = $next;

        return $next;
    }

    public function handle(CartInterface $cart, CartItemInterface $item): CartInterface
    {
        if (!$this->next) {
            return $cart;
        }

        return $this->next->handle($cart, $item);
    }
}
