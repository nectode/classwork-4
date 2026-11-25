<?php
// Задача 4. Абстрактный класс «Сотрудник» и свойства

spl_autoload_register(function (string $class): void {
    $path = __DIR__ . '/classes/' . $class . '.php';
    if (file_exists($path)) {
        require $path;
    }
});

$employees = [
    new Manager('Анна Петрова', 90000),
    new Manager('Игорь Смирнов', 2000),   // премия меньше минимума -> MIN_BONUS
    new Developer('Олег Кузнецов', 120000, 3),
    new Developer('Мария Орлова', 80000, 1),
    new Developer('Денис Ли', 3000, 0),   // премия меньше минимума -> MIN_BONUS
];

$totalPayments = 0;
foreach ($employees as $employee) {
    echo $employee->getInfo() . "\n";
    $totalPayments += $employee->getSalary() + $employee->calculateBonus();
}

echo "\nОбщая сумма выплат (оклад + премия): " . number_format($totalPayments, 2, '.', ' ') . " руб.\n";
echo "Количество сотрудников: " . Employee::getEmployeeCount() . "\n";
