<html>
	<head>
		<title>Demo</title>
		<meta charset="utf-8" />

	</head>
	<body>
		<h1>Время суток</h1>
		<?php
			date_default_timezone_set("Europe/Moscow");
			//date_default_timezone_set("America/Los_Angeles");
			
			$now=date("H:i:s");
			//echo("Последний раз страница была открыта в $now");
			$hour = date("H");
			$nameimg="";
			if ($hour<5) {
				$greeting="Доброй ночи!";
				$nameimg="images/noch.jpg";
			}
			if ($hour>=5 and $hour<12){
				$greeting="Доброе утро!";
				$nameimg="images/utro.jpg";
			}
			if ($hour>=12 and $hour<18){
				$greeting="Добрый день!";
				$nameimg="images/den.jpg";
			}
			if ($hour>=18){
				$greeting="Добрый вечер!";
				$nameimg="images/vecher.jpg";
			}
		?>
		
		<form>
			<h1><?=$greeting?></h1>
			<img src=<?=$nameimg?> style="width:200px" />
		</form>

	</body>
</html>