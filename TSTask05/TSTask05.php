<html>
  <head>
    <title>Demo</title>
    <meta charset="utf-8" />
    
  </head>
  <body>
    <h1>Первый взгляд на PHP</h1>
    
    <form>
      <select name="zone">
        <option value="Europe/Moscow">Moscow</option>
        <option value="America/New_York">New York</option>
        <option value="Asia/Tokyo">Tokyo</option>
      </select>  
      <button>Go!</button>
    </form>
    
    <?php
      
      $x = 2;
      $y = 3;
      $z = $x + $y;

    
      //echo("Result: $z");
    // Выбран ли хоть один город
    if(isset($_GET['zone'])) {
     $selectOption = $_GET['zone'];
    }
    // Defaul zone
    else {
        
        $selectOption = "Europe/Moscow";
    }
      date_default_timezone_set($selectOption);
      //date_default_timezone_set("America/Los_Angeles");
      //date_default_timezone_set("Asia/Hong_Kong");
      
      $now = date("H:i:s");
      //echo("<h2>Время открытия страницы: $now</h2>");
      $hour = date("H");
			$greeting = "Добрый вечер!";
			if ($hour<5) 
			{
				$greeting = "Доброй ночи!";
				echo "<img width='500' src='images/дн.jpg'>";
				}
			if ($hour>=5 and $hour<12) {
				$greeting = "Доброе утро!";
				echo "<img width='500' src='images/ду.jpg'>";
				}
			if ($hour>=12 and $hour<18) {
				$greeting = "Добрый день!";
				echo "<img width='500' src='images/дд.jpg'>";
				}
			if ($hour>=18)
				echo "<img width='500' src='images/дв.jpg'>";
				$greeting = "Добрый вечер!";
			
		?>
		<h3>Время открытия страницы: <?=$now?>! </h3>
		<h4><?=$greeting?></h4>
		
	</body>
</html>