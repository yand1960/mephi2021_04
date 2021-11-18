<?php
// В PHP ссеию нужно стратовать чтобы мы хотим чтобы страница началась
session_start();

$id = $_REQUEST["id"];
$qty = $_REQUEST["qty"];

$car = [];
// Не хранится ли в сессии корзина? Если да, прочитать ее
if (isset($_SESSION["cart"]))
    $cart = $_SESSION["cart"];
// Добавляем к корзине(массив) новый товар 
$cart[] = [$id, $qty];
//Сохраняем корзину в сессии на сервере
$_SESSION["cart"] = $cart;

echo(json_encode($cart));
