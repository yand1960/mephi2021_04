<html>
	<head>
		<title>Demo</title>
		<meta charset="utf-8" />
	</head>	
	<body>
		<h1>Первый взгляд на PHP</h1>
		<form>
			<select name="zone">
				<option value="1">Moscow</option>
				<option value="2">Tokio</option>
				<option value="3">San-Fransisco</option>
			</select>
        <button name="btn">Жмяк!</button>		
		</form>
		
		<?php
			
			
			if ($_REQUEST['zone'] == "1"){
				date_default_timezone_set("Europe/Moscow");
				echo($_REQUEST['zone']);
			}
			
			if ($_REQUEST['zone'] == "2"){
				date_default_timezone_set("Asia/Hong_Kong");
				echo($selectOption);
			}
			
			if ($_REQUEST['zone'] == "3"){
				date_default_timezone_set("America/Los_Angeles");
				echo($selectOption);
			}
			
			#date_default_timezone_set("Europe/Moscow");
			#date_default_timezone_set("America/Los_Angeles");
			#date_default_timezone_set("Asia/Hong_Kong");
			
			
			$now = date("H:i:s");
			//echo("Время открытия страницы: $now");
			$hour = date("H");
			if ($hour <5){
				$greeting = "Доброй ночи!";
				$imagemaker = "images/night.jpg";
			}
			if ($hour >= 5 and $hour <12){
				$greeting = "Доброе утро!";
				$imagemaker = "images/morn.jpg";
			}
			if ($hour >= 12 and $hour <18) {
				$greeting = "Добрый день!";
				$imagemaker = "images/noon.jpg";
			}
			if ($hour >= 18){
				$greeting = "Добрый вечер!";
				$imagemaker = "images/evening.jpg";
			}
		?>
		<h2>Время открытия страницы: <?=$now?></h2>
		<h1><?=$greeting?></h1>
		<img src="<?=$imagemaker?>" style="width: 200px"/>
	</body>
</html>




