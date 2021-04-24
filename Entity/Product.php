<?php

declare(strict_types=1);

namespace Entity;

class Product implements ProductInterface
{
    /**
     * @var string
     */
    public string $type;

    public function getType():string
    {
        return $this->type;
    }
}
