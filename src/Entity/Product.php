<?php

declare(strict_types=1);

namespace App\Entity;

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

    public function setType(string $type):ProductInterface
    {
        $this->type = $type;

        return $this;
    }
}
