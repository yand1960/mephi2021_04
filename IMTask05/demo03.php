<html>
	<head>
		<title>Demo</title>
		<meta charset="utf-8"/>
		
	</head>
	<body>
		<h1 id="hdr1">PHP first view</h1>
		
		<form>
			<select name="zone">
				<option>Moscow</option>
				<option>Los Angeles</option>
				<option>Hong Kong</option>
			</select>
			<button>Go</button>
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
			//echo("<h2>Время открытия страницы: $now</h2>");
			$hour = date("H");
			$greeting = "Добрый вечер!";
			if ($hour<6) {
				$greeting = "Доброй ночи!";
				echo "<img width='350' src='images/ночь.jpg'>";}
			if ($hour>=6 and $hour<12) {
				$greeting = "Доброе утро!";
				echo "<img width='350' src='images/утро.jpg'>";}
			if ($hour>=12 and $hour<18) {
				$greeting = "Добрый день!";
				echo "<img width='350' src='images/день.jpg'>";}
			if ($hour>=18)
				echo "<img width='350' src='images/вечер.jpg'>";
				//$greeting = "Добрый вечер!";
			
		?>
		<h3>Время открытия страницы: <?=$now?>! </h3>
		<h4><?=$greeting?></h4>
		
	</body>
</html>

