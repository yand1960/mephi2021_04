<html>
	<head>
		<title>Demo</title>
		<meta charset="utf-8">
		
	</head>
	<body>
		<h1>Первый взгляд на PHP</h1>
		<form>
			<select name="zone">
				<option>Moscow</option>
				<option>Hong Kong</option>
				<option>Los Angeles</option>
			</select>
			<button>Go!</button>
			
		</form>
		<?php
			if ($_REQUEST["zone"] == "Moscow")
				date_default_timezone_set("Europe/Moscow");
			if ($_REQUEST["zone"] == "Hong Kong")
				date_default_timezone_set("Asia/Hong_Kong");
			if ($_REQUEST["zone"] == "Los Angeles")
				date_default_timezone_set("America/Los_Angeles");
			$x = 2;
			$y = 3;
			$z = $x + $y;
			//echo("Result: $z");
			
			//date_default_timezone_set("Europe/Moscow");
			//date_default_timezone_set("Asia/Hong_Kong");
			//date_default_timezone_set("America/Los_Angeles");
			$now = date("H:i:s");
			//echo("<h2>Время открытия страницы: $now</h2>");
			$hour = date("H");
			if ($hour < 5){
				$greeting = "Доброй ночи!";
				echo "<img src='images/night.jpg' width='200px'>";
			}
			if ($hour >=5 and $hour < 12){
				$greeting = "Доброе утро!";
				echo "<img src='images/morning.jpg' width='200px'>";
			}
			if ($hour >=12 and $hour < 18){
				$greeting = "Добрый день!";
				echo "<img src='images/day.jpg' width='200px'>";
			}
			if ($hour >=18){
				$greeting = "Добрый вечер!";
				echo "<img src='images/evening.jpeg' width='200px'>";
			}
			

		
		?>
		
		<h2>Время открытия страницы: <?=$now?>!</h2>
		<h1><?=$greeting?></h1>
		
		
	</body>
	


</html>