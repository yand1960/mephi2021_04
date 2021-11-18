<?php
session_start();



$username = "";
$email    = "";
$errors = array(); 



include("params.php");

$conn = mysqli_connect(SERVER_URL,DB_USER,DB_PWD,DB_NAME);


if (isset($_POST['reg_user'])) {

  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);


  if (empty($username)) { array_push($errors, "Небходимо придумать имя пользователя"); }
  if (empty($email)) { array_push($errors, "Без электронной почты не зарегистриуешься"); }
  if (empty($password_1)) { array_push($errors, "Придумай и введи пароль"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Пароли не совпадают");
  }


  $user_check_query = "SELECT * FROM users WHERE UserName='$username' OR Email='$email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['UserName'] === $username) {
      array_push($errors, "Такое имя уже существует");
    }

    if ($user['Email'] === $email) {
      array_push($errors, "Такой Email уже существует");
    }
  }


  if (count($errors) == 0) {
  	$password = sha1($password_1);

  	$query = "INSERT INTO users (UserName, Email, PwdHash) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($conn, $query);
  	$_SESSION['UserName'] = $username;
  	header('location: index0.php');
  }
}

?>


<html>
<head>
  <title>Регистрация новых пользователей</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Регистрация</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Ваше имя</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Пароль</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Повторите пароль</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Регистрация</button>
  	</div>
  	<p>
  		Вы уже зарегестрированы? <a href="login.php">Вход в систему</a>
  	</p>
  </form>
</body>
</html>


