<?php

declare(strict_types=1);

namespace App\Handler;

use App\Entity\CartInterface;
use App\Entity\CartItemInterface;
use \Exception;

class RemovalHandler extends AbstractHandler
{
    /**
     * @var CartInterface
     */
    private CartInterface $cart;

    /**
     * @param CartInterface $cart
     * @param CartItemInterface $item
     * @return CartInterface
     * @throws Exception
     */
    public function handle(CartInterface $cart, CartItemInterface $item): CartInterface
    {
        $this->cart = $cart;
        $this->doRemove($item);

        return parent::handle($cart, $item);
    }

    /**
     * @param CartItemInterface $existingItem
     * @throws Exception
     */
    private function doRemove(CartItemInterface $existingItem): void
    {
        //do something before remove

        $this->cart->removeItem($existingItem->getId());
    }
}
