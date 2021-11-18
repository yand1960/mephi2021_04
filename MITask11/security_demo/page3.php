<?php
    session_start();
    if(!isset($_SESSION["user_token"]) or $_SESSION["user_token"] !="Admin"){
        echo("Требуется аут...");
        echo('<meta http-equiv="refresh" content="3; login.php"> ');
        die("");
    }
?>
<html>
    <head>
        <title>page 3</title>
    </head>
    <body>
        <h1>Страница для админов</h1>

