<?php
// Задача 1. Простая автозагрузка: только регистрация автозагрузчика, без require классов

spl_autoload_register(function (string $class): void {
    $path = __DIR__ . '/classes/' . $class . '.php';
    if (file_exists($path)) {
        require $path;
    }
});

$user = new User('Иван', 'ivan@example.com');
$book = new Product('Книга', 500);
$mug  = new Product('Кружка', 350);
$order = new Order($user, [$book, $mug]);

echo "Пользователь: " . $user->getInfo() . "\n";
echo $book->getInfo() . "\n";
echo $mug->getInfo() . "\n";
echo "Итоговая сумма заказа: " . $order->getTotal() . " руб.\n";
