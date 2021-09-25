<html>
	<head>
		<title>Demo</title>
		<meta charset="UTF-8" />
	</head>	
	<body>
		<h1>Первый взгляд на PHP</h1>
		<?php
			$x = 2;
			$y = 3;
			$z = $x + $y;
			//echo("Result: $z");
			
			date_default_timezone_set("Europe/Moscow");
			#date_default_timezone_set("America/Los_Angeles");
			#date_default_timezone_set("Asia/Hong_Kong");
			
			$now = date("H:i:s");
			//echo("Время открытия страницы: $now");
			$hour = date("H");
			if ($hour <5){
				$img = "images/Night.jpg";
				$greeting = "Доброй ночи!";
			}
			if ($hour >= 5 and $hour <12){
				$img = "images/Morning.jpg";
				$greeting = "Доброе утро!";
			}
			if ($hour >= 12 and $hour <18) {
				$img = "images/Day.jpg";
				$greeting = "Добрый день!";
			}
			if ($hour >= 18){
				$img = "images/Evening.jpg";
				$greeting = "Добрый вечер!";
			}
		?>
		<h2>Время открытия страницы: <?=$now?></h2>
		<h1><?=$greeting?></h1>
		<img src="<?=$img?>"/>
	</body>
</html>
