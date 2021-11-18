<?php
    session_start();
    if(!isset($_SESSION["user_token"])){
        echo("Переносим на страницу регистрации...");
        echo('<meta http-equiv="refresh" content="3; register.php"> ');
        die("");
    }
?>
<html>
    <head>
        <title>page 4</title>
    </head>
    <body>
        <h1>Страница регистрации</h1>