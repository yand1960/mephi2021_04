
<?php

header("Content-Type: application/json; charset=UTF-8");

include("../../shop_params.php");

function create_product_order($conn, $product_order){

    $product_id = $product_order["product_id"];
    $quantity = $product_order["quantity"];
    $price = $product_order["price"];
    $sql = "INSERT INTO orders (ProductID, Price, Qty, OrderDate) VALUES ('$product_id', '$price','$quantity' , NOW())";

    return $conn->query($sql) === TRUE;
}

function calculate_total_price($carts, $products){
    $total_price = 0;

    foreach($products as $product_id => $product) {
        $total_price +=  $product["price"] * $carts[$product_id];

    }
    return $total_price;
}

function init_product_map($products){
    $carts = [];
    foreach($products as $product_id => $product){
        $carts[$product_id] = 0;
    }
    return $carts;
}

function create_order($carts, $products){
    $product_order = [
        "product_id" => 0,
        "quantity" => 0,
        "price" => 0,
    ];
    $conn = mysqli_connect(SERVER_URL, DB_USER, DB_PWD, DB_NAME);

    foreach($products as $product_id => $product) {
        if ($carts[$product_id] != 0) {
            $product_order["product_id"] = $product_id;
            $product_order["quantity"] = $carts[$product_id];
            $product_order["price"] = $product["price"];

            $ok = create_product_order($conn, $product_order);
        }
    }
    mysqli_close($conn);
}

session_start();

$response = [];
$total_price = 0;
if (isset($_SESSION["cart"]) && isset($_SESSION["products"])) {
    $carts = $_SESSION["cart"];
    $products = $_SESSION["products"];

    $total_price = calculate_total_price($carts, $products);
    create_order($carts, $products);
    $_SESSION["cart"] = init_product_map($products);

    
}

$response["total_price"] = $total_price;
echo(json_encode($response));
?>
