<html>
	<head>
		<title>Greeting</title>
	</head>
	<body>
		<h1>PHP greeting</h1>
		<?php
			date_default_timezone_set("Europe/Moscow");
			//date_default_timezone_set("America/Los_Angeles");
			//date_default_timezone_set("Asia/Hong_Kong");
			$now = date("H:i:s");
			$hour = date("H");
			if ($hour<5) {
				$greeting = "Доброй ночи!";
				echo "<img width='250' src='images/ночь.jpg'>";}
			if ($hour>=5 and $hour<12) {
				$greeting = "Доброе утро!";
				echo "<img width='250' src='images/утро.jpg'>";}
			if ($hour>=12 and $hour<18) {
				$greeting = "Добрый день!";
				echo "<img width='250' src='images/день.jpg'>";}
			if ($hour>=18)
				$greeting = "Добрый вечер!";
				echo "<img width='250' src='images/вечер.jpg'>";		
		?>
		<h2>Время обновления страницы: <?=$now?> </h2>
		<h3><?=$greeting?></h3>
	</body>
</html>

