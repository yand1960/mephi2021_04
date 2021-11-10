<?php

function add_calc($x,$y,$operation,$z) {
	
	// С точки зрения безопасности чудовищно
	// 1. Слабый пароль
	// 2. Нарушен принцип наименьших привилегий
	// 3. Секрет в коде
	$conn = mysqli_connect("127.0.0.1:33062","root","","mephi4");
	// 4. При таком коде возможна хакерская атака SQL Injection
	$sql = "INSERT INTO calcs(Number1,Number2,Operation,Result)
			VALUES($x, $y, '$operation', $z)";
	//echo $sql;
	mysqli_query($conn, $sql);
	
	mysqli_close($conn);
	
}

// Тестовый код - закомментировать
// add_calc(1,2,"test",3);


