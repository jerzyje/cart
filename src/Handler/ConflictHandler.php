<?php

declare(strict_types=1);

namespace App\Handler;

use App\Entity\CartInterface;
use App\Entity\CartItemInterface;

final class ConflictHandler extends AbstractHandler
{
    /**
     * @var CartInterface
     */
    private CartInterface $cart;

    public function handle(CartInterface $cart, CartItemInterface $item): CartInterface
    {
        $this->cart = $cart;
        $existingItem = $this->cart->getItemByType(
            $item->getProduct()->getType()
        );
        if ($existingItem) {
            $this->doRemove($existingItem);
        }

        return parent::handle($cart, $item);
    }

    private function doRemove(CartItemInterface $existingItem): void
    {
        //do something before remove

        $this->cart->removeItem($existingItem->getId());
    }
}
