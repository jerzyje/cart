<?php

declare(strict_types=1);

namespace App;

use App\Entity\CartItemInterface;
use App\Exception\CartItemNotFoundException;

interface CartServiceInterface
{
    /**
     * @param CartItemInterface $item
     */
    public function addItem(CartItemInterface $item): void;

    /**
     * @param int $id
     * @throws CartItemNotFoundException
     */
    public function removeItem(int $id): void;

    public function clearCart(): void;

    /**
     * @param string $type
     * @return bool
     */
    public function isExistItemByType(string $type): bool;
}