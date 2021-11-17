<html>
	<head>
		<title>Удвоитель</title>
		<meta charset="utf-8" />
		
	</head>
	<body>
		<h1>Мы удвоим ваше число!</h1>
		<?php
			$amount = "";
			if(isset($_REQUEST["data"]))
				$amount = $_REQUEST["data"];
		?>
		
		<form>
			<input type="number" required="required" autocomplete="off"
						name="data" value="<?=$amount?>"/>
			<input type="submit" value="Попробуйте!"/>
		</form>
		
		<?php
			if(isset($_REQUEST["data"])) {
				$amount *= 2;
				echo("<h3>Ваша новое число: $amount</h3>");
			}
		?>
		
		
	</body>
</html>