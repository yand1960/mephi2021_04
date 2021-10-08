<html>
	<head>
		<title>Demo</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<h1>Первый взгляд на PHP</h1>
		<form>
			<select name = "zone">
		
				<option>Moscow</option>
				<option>Los_Angeles</option>
				<option>Hong_Kong</option>
			</select>
			<button>GO!</button>
		</form>
		
		
		<?php
		
		
			$x = 2;
			$y = 3;
			$z = $x + $y;
			//echo("Result: $z");
				if ($_REQUEST["zone"]=="Moscow") {
			date_default_timezone_set("Europe/Moscow"); }
				if ($_REQUEST["zone"]=="Los Angeles") {
			date_default_timezone_set("America/Los_Angeles"); }
				if ($_REQUEST["zone"]=="Hong Kong") {
			date_default_timezone_set("Asia/Hong_Kong"); }
			$now = date("H:i:s");
			//echo("Время открытия страницы: $now</h2>");
			$greeting = "Добрый вечер!";
			$hour = date("H");
			if ($hour<5) {
				$greeting = "Доброй ночи!";
			echo '<img src="images/4.jpg"   width="400" height="300">';
				}
			if ($hour>=5 and $hour<12) {
				$greeting = "Доброе утро!";
				echo '<img src="images/1.jpg"   width="400" height="300">';
				}
			if ($hour>=12 and $hour<18) {
				$greeting = "Добрый день!";
			echo '<img src="images/2.jpg"   width="400" height="300">';
				}
			if ($hour>=18) {
			echo '<img src="images/3.jpg"   width="400" height="300">';
			}
				//$greeting = "Добрый вечер!";
				
			
			
			
		?>
		<h2> Время открытия страницы: <?=$now?> ! </h2>
		<h1> <?=$greeting ?> </h1>
		
	</body>

</html>