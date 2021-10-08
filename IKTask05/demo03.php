<html>
	<head>
		<title>Привет мир</title>
		<meta charset="utf-8" />
	</head>	
	<body>
		<form action="" method="post">
			<label for="time_arial">Выберите часовой пояс:</label>
			<select name="time_arial" id="time_arial">
				<option value="3">Moscow</option>
				<option value="9">Tokio</option>
				<option value="-4">NY</option>
			</select>
			<input type="submit" name="submit" value="Go">
		</form>

		<?php

			if(isset($_POST['submit'])){
				if(!empty($_POST['time_arial'])) {
					$selected = $_POST['time_arial'];
					echo 'Текущий часовой пояс: ' . $selected;
					$hours = date("H", time()) +$selected;

					if ($hours >= 0 and $hours <8) {
						$url_to_load = "https://www.youtube.com/embed/n--TEFlviTU";
					} elseif ($hours > 8 and $hours <16) {
						$url_to_load = "https://www.youtube.com/embed/mqF1dszRofg";
					} else {
						$url_to_load = "https://www.youtube.com/embed/O_KFjdHSy6U";
					} 
				}
			}


		?>
   		<iframe width="560" height="315" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="embed-responsive-item" src="<?php echo $url_to_load; ?>"></iframe>
	</body>
</html>