<?php
// Задача 5. Итоговый мини-проект «Каталог товаров»

spl_autoload_register(function (string $class): void {
    $prefix = 'App\\';
    $baseDir = __DIR__ . '/src/';

    if (str_starts_with($class, $prefix)) {
        $relative = substr($class, strlen($prefix));
        $file = $baseDir . str_replace('\\', '/', $relative) . '.php';
        if (file_exists($file)) {
            require $file;
        }
    }
});

use App\Book;
use App\Electronics;
use App\Product;

$catalog = [
    new Book('Мастер и Маргарита', 650),
    new Book('PHP для начинающих', 1200),
    new Book('Чистый код', 2100),
    new Electronics('Наушники', 4500, 10),
    new Electronics('Смартфон', 25000, 15),
    new Electronics('Клавиатура', 3200, 5),
];

echo "Каталог товаров:\n";
$total = 0;
foreach ($catalog as $item) {
    echo $item->getInfo() . "\n";
    $total += $item->getFinalPrice();
}

echo "\nСумма конечных цен по каталогу: " . number_format($total, 2, '.', ' ') . " руб.\n";
echo "Всего создано товаров: " . Product::getCount() . "\n";
