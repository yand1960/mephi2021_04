<?php
session_start();
 if(!isset($_SESSION["user_token"])){
     echo("Требуется аутентификация. Перенаправление на страницу логина...");
    echo('<meta http-equiv="refresh" content="3; login.php"> ');
    die(" ");
 }
?>

<html>
    <head>
        <title>page2</title>
    </head>
    <body>
        <h1>Страница для аутентифицированных пользователей</h1>


  
    </body>
</html>