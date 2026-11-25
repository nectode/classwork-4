<?php

class Developer extends Employee
{
    public function __construct(
        string $name,
        float $salary,
        private int $experienceYears,
    ) {
        parent::__construct($name, $salary);
    }

    // Премия 15% от оклада + 1000 за каждый год стажа, но не меньше MIN_BONUS
    public function calculateBonus(): float
    {
        $bonus = $this->salary * 0.15 + 1000 * $this->experienceYears;
        return $this->applyMinBonus($bonus);
    }
}
