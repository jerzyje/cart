<?php

declare(strict_types=1);

use Handler\HandlerChainBuilder;
use Repository\CartRepositoryInterface;
use Entity\CartItemInterface;

class CartService implements CartServiceInterface
{
    /**
     * @var CartRepositoryInterface
     */
    private $repository;

    /**
     * @var HandlerChainBuilder
     */
    private $handlersBuilder;

    public function __construct(CartRepositoryInterface $repository, HandlerChainBuilder $handlersBuilder)
    {
        $this->repository = $repository;
        $this->handlersBuilder = $handlersBuilder;
    }

    public function addItem(CartItemInterface $item): void
    {
        // TODO: Implement addItem() method.
    }

    public function removeItem(int $id): void
    {
        // TODO: Implement removeItem() method.
    }

    public function clearCart(): void
    {
        // TODO: Implement clearCart() method.
    }

    public function isExistItemByType(string $type): bool
    {
        // TODO: Implement isExistItemByType() method.
    }
}