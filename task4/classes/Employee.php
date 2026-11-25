<?php

abstract class Employee
{
    // Минимальный размер премии (константа класса)
    public const MIN_BONUS = 500;

    // Счётчик созданных сотрудников (статическое свойство)
    private static int $employeeCount = 0;

    public function __construct(
        protected string $name,
        protected float $salary,
    ) {
        self::$employeeCount++;
    }

    abstract public function calculateBonus(): float;

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function getInfo(): string
    {
        return sprintf(
            '%s (%s): оклад = %.2f, премия = %.2f',
            $this->name,
            static::class,
            $this->salary,
            $this->calculateBonus()
        );
    }

    public static function getEmployeeCount(): int
    {
        return self::$employeeCount;
    }

    // Общая проверка минимальной премии для наследников
    protected function applyMinBonus(float $bonus): float
    {
        return max($bonus, self::MIN_BONUS);
    }
}
