<html>
	<head>
		<title>Greeting</title>
	</head>
	<body>
		<h1>PHP greeting</h1>
		<?php
			date_default_timezone_set("Europe/Moscow");
			$now = date("H:i:s");
			$hour = date("H");
			if ($hour<5) {
				$greeting = "Good night!";
				echo "<img width='300' src='images/night.jpg'>";}
			if ($hour>=5 and $hour<12) {
				$greeting = "Good morning!";
				echo "<img width='300' src='images/morning.jpg'>";}
			if ($hour>=12 and $hour<18) {
				$greeting = "Good afternoon!";
				echo "<img width='300' src='images/afternoon.jpg'>";}
			if ($hour>=18)
				$greeting = "Good evening!";
				echo "<img width='300' src='images/evening.jpg'>";		
		?>
		<h2>Время открытия страницы: <?=$now?> </h2>
		<h3><?=$greeting?></h3>
	</body>
</html>

