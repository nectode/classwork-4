<?php

class Manager extends Employee
{
    // Премия 20% от оклада, но не меньше MIN_BONUS
    public function calculateBonus(): float
    {
        return $this->applyMinBonus($this->salary * 0.20);
    }
}
