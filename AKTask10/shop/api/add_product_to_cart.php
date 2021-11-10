
<?php

header('charset=utf-8');
mb_internal_encoding("UTF-8");
session_start();

$cart = $_SESSION["cart"];

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

	$_SESSION["cart"] = $cart;
}

echo(json_encode($cart));
?>



