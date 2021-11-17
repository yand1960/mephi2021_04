<html>
	<head>
		<title>Calc</title>
		<meta charset="UTF-8" />
	</head>	
	<body>
		<h1>Калькулятор</h1>
		<?php
		
			include("calculations.php");
		
			$x=""; $y=""; $z="";
		
			if (isset($_REQUEST["x"])) {
				$x = $_REQUEST["x"];
				$y = $_REQUEST["y"];
				if($_REQUEST["operation"] == "+")
					$z = plus($x, $y);
				else
					$z = minus($x, $y);
			}
			
		?>
		
		 <form>
			<input type="number" name="x" value="<?=$x?>"/> <br />
			<input type="number" name="y" value="<?=$y?>"/> <br />
			<input type="submit" value="+" name="operation" /> 
			<input type="submit" value="-" name="operation"/> 
			<br />
			<input type="number" value="<?=$z?>"/> <br />
		 </form>
		
	</body>
</html>