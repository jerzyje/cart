<?php

declare(strict_types=1);

namespace App\Entity;

class CartItem implements CartItemInterface
{
    /**
     * @var int
     */
    public int $id;

    /**
     * @var ProductInterface
     */
    public ProductInterface $product;

    /**
     * @var int
     */
    public int $quantity;

    /**
     * @inheritDoc
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function setId(int $id): CartItemInterface
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getProduct(): ProductInterface
    {
        return $this->product;
    }

    /**
     * @inheritDoc
     */
    public function setProduct(ProductInterface $product): CartItemInterface
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setQuantity(int $quantity): CartItemInterface
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }
}