<?php
    session_start();
?>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <h1>Регистрация</h1>
        <form method="post">
            <p>Придумайте логин:</p>
            <input type="text" name="user" /> <br />
            <p>Введите свой email:</p>
            <input type="text" name="email" /> <br />
            <p>Придумайте пароль:</p>
            <input type="password" name="pwd" /> <br /> 
            <input type="submit" value="Зарегистрироваться" style="margin-top: 10px;" />
        </form>
        <?php
            if (isset($_REQUEST["user"])) {
                $user = $_REQUEST["user"];
                $email = $_REQUEST["email"];
                $pwd = $_REQUEST["pwd"];
                $hash = sha1($pwd);
                include("params.php");
                $conn = mysqli_connect(SERVER_URL,DB_USER,DB_PWD,DB_NAME);
                $sql = "INSERT INTO users (UserName, PwdHash, Email)
                VALUES ('$user', '$hash', '$email')";
                if ($conn->query($sql)===TRUE){
                    echo("<h2>Вы успешно зарегистрировались! Теперь Вы можете войти в систему</h2>");
                } else{
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            } 
        ?>
        <button onclick="f_link();">Вернуться к странице авторизации</button>
        <script src="../scripts/script.js"></script>
        </body>
</html>