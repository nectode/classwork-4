<?php

namespace App;

class Book extends Product
{
    // Конечная цена = базовая цена + налог
    public function getFinalPrice(): float
    {
        return $this->price * (1 + self::TAX);
    }
}
