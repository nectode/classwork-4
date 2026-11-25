<?php
// Задача 3. Абстрактный класс «Фигура»

spl_autoload_register(function (string $class): void {
    $path = __DIR__ . '/classes/' . $class . '.php';
    if (file_exists($path)) {
        require $path;
    }
});

$shapes = [
    new Circle(5),
    new Rectangle(4, 6),
    new Triangle(3, 4, 5),
    new Circle(1.5),
];

foreach ($shapes as $shape) {
    echo $shape->describe() . "\n";
}

// new Shape(); вызовет Fatal error: Cannot instantiate abstract class Shape.
// Абстрактный класс — лишь заготовка: в нём есть методы без реализации
// (area, perimeter), поэтому объект такого класса работать не мог бы.
// Создавать можно только объекты конкретных наследников.
try {
    $shape = new Shape();
} catch (Error $e) {
    echo "\nОшибка: " . $e->getMessage() . "\n";
}
