<?php
    session_start();
    if(!isset($_SESSION["user_token"])){
        echo("Требуется аутефикация. Перенаправление на страницу логина...");
        echo('<meta http-equiv="refresh" content="3; login.php"> ');
        die("");
    }
?>
<html>
    <head>
        <title>page 2</title>
    </head>
    <body>
        <h1>Страница для аунтефецированных пользователей</h1>

