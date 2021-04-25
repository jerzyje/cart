<?php

declare(strict_types=1);

use Entity\CartItemInterface;

class CartService implements CartServiceInterface
{
    private const ADDITION_HANDLERS = [
        ScpAdditionHandler::class,
        UpdatingConflictHandler::class,
        BundleAdditionHandler::class,
        AdditionHandler::class
    ];

    private const REMOVAL_HANDLERS = [
        RemovalHandler::class
    ];

    public function addItem(CartItemInterface $item): void
    {
        // TODO: Implement addItem() method.
    }

    public function removeItem(int $id): void
    {
        // TODO: Implement removeItem() method.
    }

    public function isExistItemByType(string $type): bool
    {
        // TODO: Implement isExistItemByType() method.
    }
}