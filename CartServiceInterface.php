<?php

declare(strict_types=1);

use Entity\CartItemInterface;

interface CartServiceInterface
{
    /**
     * @param CartItemInterface $item
     */
    public function addItem(CartItemInterface $item): void;

    /**
     * @param int $id
     */
    public function removeItem(int $id): void;

    /**
     * @param string $type
     * @return bool
     */
    public function isExistItemByType(string $type): bool;
}