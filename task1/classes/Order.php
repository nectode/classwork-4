<?php

class Order
{
    /**
     * @param Product[] $products
     */
    public function __construct(
        private User $user,
        private array $products,
    ) {}

    public function getTotal(): float
    {
        return array_sum(array_map(fn(Product $p) => $p->getPrice(), $this->products));
    }
}
