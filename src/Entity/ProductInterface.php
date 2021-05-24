<?php

declare(strict_types=1);

namespace App\Entity;

interface ProductInterface
{
    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @param string $type
     * @return ProductInterface
     */
    public function setType(string $type): ProductInterface;
}
