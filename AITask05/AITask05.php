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
				<option>Tokyo</option>
				<option>Los_Angeles</option>
			</select>
			<button>Go</button>
		</form>
		
		
		<?php
			
			
			if(isset($_REQUEST["zone"]))
				$zone=$_REQUEST["zone"];
			
			if ($zone=='Moscow'){
				date_default_timezone_set('Europe/Moscow');
			}

			if ($zone=='Tokyo'){
				date_default_timezone_set('Asia/Tokyo');
			}
			if ($zone=='Los_Angeles'){
				date_default_timezone_set('America/Los_Angeles');
			}
			
			$now=date("H:i:s");
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