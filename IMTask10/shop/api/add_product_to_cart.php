
<?php



header('charset=utf-8');
mb_internal_encoding("UTF-8");
//В PHP сессию надо стартовать
session_start();

$cart = $_SESSION["cart"];

//Добавляем в корзине новый товар. Если указано количество - обновляем количество. 
// Если нет - добавляем один указанный товар, если его ещё нет
if (isset($_REQUEST["id"])) {
	$id = $_REQUEST["id"];

	if (isset($_REQUEST["qty"])) {
		$qty = $_REQUEST["qty"];
		if ($qty >= 0) {
			$cart[$id] = $qty;
		}

	} else if ($cart[$id] == 0) {
		$cart[$id] = 1;
	}

	//Обновляем корзину в сессии
	$_SESSION["cart"] = $cart;
}




echo(json_encode($cart));
?>



