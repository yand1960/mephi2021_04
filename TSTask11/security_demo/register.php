<?php
    session_start();
?>
<html>
    <head>
        <title>Register</title>
    </head>
    <body>
        <h1>Register, please</h1>
        <form method="post">
            <input type="text" name="user" /> <br />
            <input type="password" name="pwd" /> <br />
            <input type="submit" value="Войти" />
        </form>

        <?php


if (isset($_REQUEST["user"])) {
    $user = $_REQUEST["user"];
    $pwd = $_REQUEST["pwd"];
    $hash = sha1($pwd);

    //echo($user." ".$hash);

    include("params.php");

    $conn = mysqli_connect(SERVER_URL,DB_USER,DB_PWD,DB_NAME);

    $sql = "SELECT * FROM users 
            WHERE UserName=?";
    $stmt = mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,'s',$user);
    mysqli_stmt_execute($stmt);
    $cursor =  mysqli_stmt_get_result($stmt);
    $results = mysqli_fetch_all($cursor);
    mysqli_close($conn);

    if (count($results) > 0) {
        echo("Repeat login");
    }else{
        $_SESSION["user_token"] = $user;
        $sql = "INSERT INTO users (UserName, PwdHash) VALUES (?,?)";
        $stmt = mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,'ss',$user, $pwd);
        mysqli_stmt_execute($stmt);
        $cursor = mysqli_stmt_get_result($stmt);
        $results = mysqli_fetch_all($cursor);
        mysqli_close($conn);
        echo("Success!");
        echo('<meta http-equiv="refresh" content="0; index0.php">  ');
    }
}
            
        ?>
    </body>
</html>