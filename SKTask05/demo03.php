<html>
	<head>
		<title>Demo</title>
		<meta charset="utf-8" />

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
		
			
			if ($_REQUEST["zone"]== "Moscow")
				date_default_timezone_set("Europe/Moscow");
			if ($_REQUEST["zone"]== "Hong Kong")
				date_default_timezone_set("Asia/Hong_Kong");
			if ($_REQUEST["zone"]== "Los Angeles")
				date_default_timezone_set("America/Los_Angeles");
			
			$x = 2;
			$y = 3;
			$z = $x + $y;
			
			//date_default_timezone_set("America/Los_Angeles");
			
			$now=date("H:i:s");
			//echo("Последний раз страница была открыта в $now");
			$hour = date("H");
			if ($hour<5)
				$greeting="Доброй ночи!";
			if ($hour>=5 and $hour<12)
				$greeting="Доброе утро!";
			if ($hour>=12 and $hour<18)
				$greeting="Добрый день!";
			if ($hour>=18)
				$greeting="Добрый вечер!";
		?>
		
		<h2>Последний раз страница была открыта в  <?=$now?></h2>
		<h1><?=$greeting?></h1>
	</body>
</html>