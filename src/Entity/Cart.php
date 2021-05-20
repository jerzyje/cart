<?php

declare(strict_types=1);

namespace App\Entity;

use \Exception;

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
            $foundItem = ($item->getId() === $id) ? $item : null;
        }
        if (null === $foundItem) {
            throw new Exception('Item with id ' . $id . ' not found in cart');
        }

        return $foundItem;
    }

    public function removeItem(int $id): CartInterface
    {
        $removingItem = $this->getItem($id);
        foreach ($this->getItems() as $item) {
            if ($removingItem->getId() === $item->getId()) {
                unset($this->items[$id]);
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
