<html>
	<head>
		<title>Курсы</title>
		<meta charset="utf-8" />
		<style>
			tr:nth-child(odd) {
				background-color: #CCCCCC;
			}
		</style>
		
	</head>
	<body>
		<h1>Учебные курсы</h1>
		<form>
			<input name="filter" 
				   value="<?=@$_REQUEST['filter']?>"/>
			<button>Найти курсы</button>
		</form>
		<table border="1">
		<?php
		include("../inc/parameters.php");

		//С точки зрения безопасности это ужас:
		$conn = mysqli_connect(DB_URL,DB_USER,DB_PWD,"tc");

		if (isset($_REQUEST["filter"]))
			$filter = $_REQUEST["filter"];
		else
			$filter = "";
		$filter .= "%";

		$sql = "SELECT * FROM courses WHERE Name LIKE ? ";
		$stmt = mysqli_prepare($conn,$sql);
		mysqli_stmt_bind_param($stmt, "s", $filter);
		mysqli_stmt_execute($stmt);
		$cursor =  mysqli_stmt_get_result($stmt);
		$courses = mysqli_fetch_all($cursor);

		//var_dump($courses);
		foreach($courses as $c) {
			//var_dump($c); echo("<br />");
			//echo($c[1]."<br />");
			$id = $c[0];
			$name = $c[1];
			$descr = $c[2];
			$duration = $c[3];
			echo("
				<tr>
					<td>$id</td>
					<td>$name</td>
					<td>$descr</td>
					<td>$duration</td>
				</tr>
			");
		}

		mysqli_close($conn);

		?>
		</table>
		<textarea></textarea>