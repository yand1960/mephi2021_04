<?php
session_start();
 if(!isset($_SESSION["user_token"]) or $_SESSION["user_token"]!="Admin"){
     echo("Требуется права администратора. Перенаправление на стрраницу логина...");
    echo('<meta http-equiv="refresh" content="3; login.php"> ');
    die(" ");
 }
?>


<html>
    <head>
        <title>index</title>
    </head>
    <body>
        <h1>Страница для админов</h1>


  
    </body>
</html>