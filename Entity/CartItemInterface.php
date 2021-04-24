<?php

declare(strict_types=1);

namespace Entity;

interface CartItemInterface {
    /**
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * @param int $id
     * @return CartItemInterface
     */
    public function setId(int $id): CartItemInterface;

    /**
     * @return ProductInterface
     */
    public function getProduct(): ProductInterface;

    /**
     * @param ProductInterface $product
     * @return CartItemInterface
     */
    public function setProduct(ProductInterface $product): CartItemInterface;

    /**
     * @param int $quantity
     * @return CartItemInterface
     */
    public function setQuantity(int $quantity): CartItemInterface;

    /**
     * @return int
     */
    public function getQuantity(): int;
}
