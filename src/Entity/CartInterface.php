<?php

declare(strict_types=1);

namespace App\Entity;

use App\Exception\CartItemNotFoundException;
use \Exception;

interface CartInterface
{
    /**
     * @return array
     */
    public function getItems(): array;

    /**
     * @param CartItemInterface $item
     * @return CartInterface
     */
    public function addItem(CartItemInterface $item): CartInterface;

    /**
     * @param int $id
     * @return CartItemInterface
     * @throws CartItemNotFoundException
     */
    public function getItem(int $id): CartItemInterface;

    /**
     * @param int $id
     * @return CartInterface
     * @throws CartItemNotFoundException
     */
    public function removeItem(int $id): CartInterface;

    /**
     * @return CartInterface
     */
    public function clear(): CartInterface;

    /**
     * @param string $type
     * @return CartItemInterface|null
     */
    public function getItemByType(string $type): ?CartItemInterface;


}