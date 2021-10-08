<html>
	<head>
		<title>Demo</title>
		<meta charset="utf-8"/>
		
	</head>
	<body>
		<h1>Первый взгляд на php</h1>
		
		<form>
			<select name ="zone">
				<option>Europe/Moscow</option>
				<option>America/Los_Angeles</option>
				<option>Asia/Hong_Kong</option>
			</select>
			<button>Go!</button>
		</form>	
		
			
			
		<?php
			$x=2;
			$y=3;
			$z=$x+$y;
			//echo("Result: $z");
			
			//date_default_timezone_set("Europe/Moscow");
			//date_default_timezone_set("America/Los_Angeles");
			date_default_timezone_set("Asia/Hong_Kong");
			
			$now = date("H:i:s");
			//echo("<h2>Время открытия страницы: $now</h2>");
			$hour = date("H");
			if($_REQUEST["zone"]="Europe/Moscow")
				date_default_timezone_set("Europe/Moscow");
			if($_REQUEST["zone"]="America/Los_Angeles")
				date_default_timezone_set("America/Los_Angeles");
			if($_REQUEST["zone"]="Asia/Hong_Kong")
				date_default_timezone_set("Asia/Hong_Kong");
			
			
			if ($hour <5) {
				$greeting = "Доброй ночи!";
				$image = "images/night.jpg";
			}
			
			if ($hour >=5 and $hour <12) {
				$greeting = "Доброе утро!";
				$image = "images/morning.jpg";
			}
			
			if ($hour >=12 and $hour <18) {
				$greeting = "Добрый день!";
				$image = "images/day.jpg";
			}
			
			if ($hour >=18) {
				$greeting = "Добрый вечер!";
				$image = "images/evening.jpg";
			}
		?>
		
		
		
		<h2>Время открытия страницы: <?=$now?>!</h2>
		<h1><?=$greeting?></h1>
		<img src="<?=$image?>" style="width: 35%"/>
	</body>
</html>