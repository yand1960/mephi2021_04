<?php
    session_start();
?>
<html>
    <head>
        <title>Register</title>
    </head>
    <body>
        <h1>Sign up</h1>
        <form method="post">
            <p>Введите логин:</p>
            <input type="text" name="user" /> <br />
            <p>Введите email:</p>
            <input type="text" name="email" /> <br />
            <p>Введите пароль:</p>
            <input type="password" name="pwd" /> <br /> 
            <input type="submit" value="Sign up" />
        </form>
        <?php

if (isset($_REQUEST["user"])) {
    $user = $_REQUEST["user"];
    $pwd = $_REQUEST["pwd"];
    $hash = sha1($pwd);
    $email = $_REQUEST["email"];

    //echo($user." ".$hash);

    include("params.php");

    $conn = mysqli_connect(SERVER_URL,DB_USER,DB_PWD,DB_NAME);

    $sql = "INSERT INTO users (UserName, PwdHash, Email) VALUES (?,?,?)";
    $stmt = mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,'sss',$user,$hash,$email);
    mysqli_stmt_execute($stmt);
    mysqli_close($conn);
}
        ?>
        </body>
</html>