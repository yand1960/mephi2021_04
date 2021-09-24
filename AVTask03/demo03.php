<html>
	<head>
		<title>Demo</title>
		<meta charset="utf-8" />
		
	</head>	
	<body>
		<h1>Первый взгляд на PHP</h1>
		<?php
			$x = 2;
			$y = 3;
			$z = $x + $y;
			//echo("Result: $z");
			
			#date_default_timezone_set("Europe/Moscow");
			#date_default_timezone_set("America/Los_Angeles");
			date_default_timezone_set("Asia/Hong_Kong");
			
			$now = date("H:i:s");
			//echo("Время открытия страницы: $now");
			$hour = date("H");
			if ($hour <5){
				$greeting = "Доброй ночи!";
				$imagemaker = "images/night.jpg";
			}
			if ($hour >= 5 and $hour <12){
				$greeting = "Доброе утро!";
				$imagemaker = "images/morn.jpg";
			}
			if ($hour >= 12 and $hour <18) {
				$greeting = "Добрый день!";
				$imagemaker = "images/noon.jpg";
			}
			if ($hour >= 18){
				$greeting = "Добрый вечер!";
				$imagemaker = "images/evening.jpg";
			}
		?>
		<h2>Время открытия страницы: <?=$now?></h2>
		<h1><?=$greeting?></h1>
		<img src="<?=$imagemaker?>" style="width: 200px"/>
	</body>
</html>




