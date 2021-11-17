<?php
    session_start();
?>
<html>
    <head>
        <title>Регистрация пользователя</title>
    </head>
    <body>
        <h1>Регистрация пользователя</h1>
        <p>Заполните формы ниже</p>
        <form method="post">
            <input type="text" name="name" required /> Имя и Фамилия<br />
            <input type="password" name="pwd" required /> Пароль<br />
            <input type="text" name="email" required /> E-mail<br />
            <input type="submit" name="done"/> Нажмите для регистрации!<br />
        </form>
    
    <?php

        if (isset($_REQUEST["name"])){
            $user=$_REQUEST["name"];
            $pwd=$_REQUEST["pwd"];
            $hash=sha1($pwd);
            $email=$_REQUEST["email"];

            include("params.php");

            $conn = mysqli_connect(SERVER_URL,DB_USER,DB_PWD,DB_NAME);
            $sql = "INSERT INTO users(UserName,PwdHash,Email)
                VALUES('{$user}','{$hash}','{$email}')";
            $stmt = mysqli_prepare($conn,$sql);
                
            mysqli_stmt_execute($stmt); 
            $cursor = mysqli_stmt_get_result($stmt);
            mysqli_close($conn);

            if ($sql) {
            // echo("Вы успешно зарегистрировались! Теперь вы можете войти на сайт, нажав на кнопку 'Войти'");
            $text = "Вы успешно зарегистрировались!\nТеперь вы можете войти на сайт, нажав на кнопку 'Войти'\n";
            echo nl2br($text); // Line 1<br />\nLine 2<br />\n
            echo('<meta http-equiv="refresh" content="3; index0.php"> ');
            die("");  
            }
            
        } 

    ?>

    </body>
</html>