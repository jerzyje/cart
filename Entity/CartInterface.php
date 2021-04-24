<?php

declare(strict_types=1);

namespace Entity;

use Exception;

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
     * @throws Exception
     */
    public function getItem(int $id): CartItemInterface;

    /**
     * @param int $id
     * @return CartInterface
     * @throws Exception
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