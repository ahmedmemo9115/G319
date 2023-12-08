<?php
session_start();
//  session_destroy();
$id = $_GET['id'];
// echo $id;

$products = json_decode(file_get_contents('products.json'), true)['products'];
$product = $products[$id - 1];

if (isset($_SESSION['cart'][$product['id']])) {
    $item = $_SESSION['cart'][$product['id']];
    if ($item['qty'] > 1){

        $item['qty'] = $item['qty'] -1;
        $_SESSION['cart'][$product['id']] = $item;
    }
    else{

        unset($_SESSION['cart'][$product['id']]);
    }
} 
if (empty($_SESSION['cart'])) {
    $_SESSION['cart_empty'] = "your cart is empty now " ;
    header("Location:products.php");
    exit();
}

$_SESSION['cart_success_remove'] = "Product removed from cart successfully : " . $product['title'];

header("location:cart.php");
die;


