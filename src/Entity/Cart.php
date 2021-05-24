<?php

declare(strict_types=1);

namespace App\Entity;

use App\Exception\CartItemNotFoundException;

class Cart implements CartInterface
{
    /**
     * @var CartItemInterface[]
     */
    private array $items = [];

    public function getItems(): array
    {
        return $this->items;
    }

    public function addItem(CartItemInterface $item): CartInterface
    {
        $item->setId($this->generateId());
        $this->items[] = $item;

        return $this;
    }

    public function getItem(int $id): CartItemInterface
    {
        $foundItem = null;
        foreach ($this->getItems() as $item) {
            if ($item->getId() === $id) {
                $foundItem = $item;
            }
        }
        if (null === $foundItem) {
            throw new CartItemNotFoundException('Item with id ' . $id . ' not found in cart');
        }

        return $foundItem;
    }

    public function removeItem(int $id): CartInterface
    {
        $removingItem = $this->getItem($id);
        foreach ($this->getItems() as $key=>$item) {
            if ($removingItem->getId() === $item->getId()) {
                unset($this->items[$key]);
            }
        }

        return $this;
    }

    public function clear(): CartInterface
    {
        $this->items = [];

        return $this;
    }

    public function getItemByType(string $type): ?CartItemInterface
    {
        foreach ($this->getItems() as $item) {
            if ($item->getProduct()->getType() === $type) {
                return $item;
            }
        }

        return null;
    }

    private function generateId(): int
    {
        $maxId = 0;
        foreach ($this->items as $item) {
            if($item->getId() > $maxId) {
                $maxId = $item->getId();
            }
        }

        return ++$maxId;
    }

}
