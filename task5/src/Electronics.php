<?php

namespace App;

class Electronics extends Product
{
    public function __construct(
        string $title,
        float $price,
        private float $warrantyPercent,
    ) {
        parent::__construct($title, $price);
    }

    // Конечная цена = базовая + налог + наценка за гарантию (в процентах)
    public function getFinalPrice(): float
    {
        $tax = $this->price * self::TAX;
        $warranty = $this->price * $this->warrantyPercent / 100;
        return $this->price + $tax + $warranty;
    }
}
