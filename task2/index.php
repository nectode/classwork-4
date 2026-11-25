<?php
// Задача 2. Автозагрузка по PSR-4: App\ -> src/

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

use App\Models\Product;
use App\Models\User;
use App\Services\PriceFormatter;

$user = new User('Мария');
$product = new Product('Рюкзак', 1250.5);

echo "Покупатель: " . $user->getName() . "\n";
echo "Товар: " . $product->getTitle() . "\n";
echo "Цена: " . PriceFormatter::format($product->getPrice()) . "\n";
