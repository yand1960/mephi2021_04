<?php
    session_start();
?>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <h1>Login, please</h1>
        <form method="post">
            <input type="text" name="user" /> <br />
            <input type="password" name="pwd" /> <br />
            <input type="submit" value="Войти" />
        </form>

        <?php

//Реализуем собственную систему аутентификации пользователей 
//на основе имен и хэшей паролей, хранящихся в БД
if (isset($_REQUEST["user"])) {
    $user = $_REQUEST["user"];
    $pwd = $_REQUEST["pwd"];
    $hash = sha1($pwd);

    //echo($user." ".$hash);

    include("params.php");

    $conn = mysqli_connect(SERVER_URL,DB_USER,DB_PWD,DB_NAME);

    $sql = "SELECT * FROM users 
            WHERE UserName=? AND PwdHash=?";
    $stmt = mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,'ss',$user,$hash);
    mysqli_stmt_execute($stmt);
    $cursor =  mysqli_stmt_get_result($stmt);
    $results = mysqli_fetch_all($cursor);
    mysqli_close($conn);

    if (count($results) > 0) {
        $_SESSION["user_token"] = $user;
        echo("Hello, $user!");
        echo('<meta http-equiv="refresh" content="0; index0.php">  ');
    }else{
        echo("Bad login!");
    }
}
            
        ?>
    </body>
</html>