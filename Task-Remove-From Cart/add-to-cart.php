<?php
session_start();
// session_destroy();
$id = $_GET['id'];
// echo $id;

$products = json_decode(file_get_contents('products.json'), true)['products'];
$product = $products[$id - 1];

if (isset($_SESSION['cart'][$product['id']])) {
    $item = $_SESSION['cart'][$product['id']];
    $item['qty'] = $item['qty'] + 1;
    $_SESSION['cart'][$product['id']] = $item;
} else {
    $product['qty'] = 1;
    $_SESSION['cart'][$product['id']] = $product;
}

$_SESSION['cart_success'] = "Product added to cart successfully : " . $product['title'];

header("location:products.php");
die;

// echo "<pre>";
// print_r($_SESSION['cart']);
// echo "</pre>";
