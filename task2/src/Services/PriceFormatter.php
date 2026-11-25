<?php

namespace App\Services;

class PriceFormatter
{
    // 1250.5 -> «1 250.50 руб.»
    public static function format(float $price): string
    {
        return number_format($price, 2, '.', ' ') . ' руб.';
    }
}
