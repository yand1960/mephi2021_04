<?php
    session_start();
?>
<html>
    <head>
        <title>Register</title>
    </head>
    <body>
        <h1>Старница регистрации</h1>
        <form method="post">
            <input type="text" name="user" /> - Ваш логин <br />
            <input type="password" name="pwd" /> - Ваш пароль <br />
            <input type="text" name="email" /> - Ваша почта <br />
            <input type="submit" value="Зарегистрироваться" />
        </form>

        <?php


if (isset($_REQUEST["user"])) {
    $user = $_REQUEST["user"];
    $pwd = $_REQUEST["pwd"];
    $hash = sha1($pwd);
    $email = $_REQUEST["email"];


    include("params.php");

    $conn = mysqli_connect(SERVER_URL,DB_USER,DB_PWD,DB_NAME);

    $sql = "INSERT INTO users (UserName, PwdHash, Email) VALUES ('$user', '$hash','$email')";
    $stmt = mysqli_prepare($conn,$sql);
    mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    $_SESSION["user_token"] = $user;
    echo('<meta http-equiv="refresh" content="0; index0.php">  ');

}
            
        ?>
    </body>
</html>