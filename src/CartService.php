<?php

declare(strict_types=1);

namespace App;

use App\Entity\Cart;
use App\Handler\AdditionHandler;
use App\Handler\ConflictHandler;
use App\Handler\HandlerChainBuilder;
use App\Handler\RemovalHandler;
use App\Repository\CartRepositoryInterface;
use App\Entity\CartItemInterface;
use Exception;

class CartService implements CartServiceInterface
{
    private const ADDITION_HANDLERS = [
        ConflictHandler::class,
        AdditionHandler::class
    ];

    private const REMOVAL_HANDLERS = [
        RemovalHandler::class
    ];

    private CartRepositoryInterface $repository;

    private HandlerChainBuilder $handlersBuilder;

    public function __construct(CartRepositoryInterface $repository, HandlerChainBuilder $handlersBuilder)
    {
        $this->repository = $repository;
        $this->handlersBuilder = $handlersBuilder;
    }

    public function addItem(CartItemInterface $item): void
    {
        $cart = $this->repository->getCart();
        $handlers = $this->handlersBuilder->build(self::ADDITION_HANDLERS);
        $cart = $handlers->handle($cart, $item);
        $this->repository->saveCart($cart);
    }

    /**
     * @param int $id
     * @throws Exception
     */
    public function removeItem(int $id): void
    {
        $cart = $this->repository->getCart();
        $existingItem = $cart->getItem($id);
        $handlers = $this->handlersBuilder->build(self::REMOVAL_HANDLERS);
        $cart = $handlers->handle($cart, $existingItem);
        $this->repository->saveCart($cart);
    }

    public function clearCart(): void
    {
        $this->repository->saveCart(new Cart());
    }

    public function isExistItemByType(string $type): bool
    {
        return null !== $this->repository->getCart()->getItemByType($type);
    }
}
