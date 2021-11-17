<?php
    session_start();
    if (!isset($_SESSION["user_token"])) {
        echo("Требуется аутентификация!");
        echo('<meta http-equiv="refresh" content="3; login.php"> ');
        die("Вы будете перенаправлены на страницу ввода пароля!");
    }
?>

<html>
    <head>
        <title>page 2</title>
    </head>
    <body>
        <h1>Страница для аутентифицированных</h1>
        