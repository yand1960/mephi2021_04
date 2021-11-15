<?php
    session_start();
    unset($_SESSION["user_token"]);
    echo('<meta http-equiv="refresh" content="3; index0.php"> ');
       
?>

<html>
    <head>
        <title>page 2</title>
    </head>
    <body>
        <h1>Вы вышли из системы</h1>