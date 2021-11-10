<?php

// В PHP сессию надо стартовать
session_start();

header("Content-Type: application/json; charset=UTF-8");

$cart = [];
//Не хранится ли в сессии корзина? Если да, прочитать ее
if (isset($_SESSION["cart"]))
    $cart = $_SESSION["cart"];

echo(json_encode($cart));