<?php
session_start();
?>

<html>
    <head>
        <title>Registration</title>
    </head>
    <body>
        <h1>Registration</h1>
        <form method="post">
            <input type="text" name="user"/><br />
            <input type="password" name="pwd"/><br />
            <input type="text" name="email"/><br />
            <input type="submit" name="Зарег"/><br />
    </form>

    <?php
        if (isset($_REQUEST["user"])){
            $user=$_REQUEST["user"];
            $pwd=$_REQUEST["pwd"];
            $hash=sha1($pwd);
            $email=$_REQUEST["email"];


            // echo($user." ".$hash);

            include("params.php");

            $conn = mysqli_connect(SERVER_URL,DB_USER,DB_PWD,DB_NAME);

            
            $log1 = "SELECT UserName, Email FROM users WHERE UserName = '{$user}' AND UserName = '{$email}' OR UserName = 'Admin' LIMIT 1";
            // $stmt2 = mysqli_prepare($conn,$log1);
            // mysqli_stmt_execute($stmt2);
            $log_sql = mysqli_query($conn,$log1) or die(mysqli_error());
            if(mysqli_num_rows($log_sql) == true){
                 echo "Пользователь уже зарегистрирован!";
                 exit();
            }
            else{
                $sql="INSERT INTO users (UserName,PwdHash,Email) VALUES ('{$user}','{$hash}','{$email}')";   
                $stmt = mysqli_prepare($conn,$sql);
                mysqli_stmt_execute($stmt); 
                $cursor = mysqli_stmt_get_result($stmt); 
                mysqli_close($conn);

                if ($sql) {
                    echo("Hello, $user! Регистрация завершена.");
                    echo('<meta http-equiv="refresh" content="3; page2.php"> ');
                  } else {
                    echo '<p>Произошла ошибка: ' . mysqli_error($conn) . '</p>';
                  } 
            }
            
            
 

        } 
        
        
    ?>
    </body>
</html>