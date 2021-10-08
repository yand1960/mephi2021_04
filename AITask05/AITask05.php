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
		?>
		<h2>В <?=$zone?> сейчас <?=$now?></h2>

	</body>
</html>