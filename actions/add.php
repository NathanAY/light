<?php
session_start();

require_once '../connect.php';

 if (isset($_POST['id'])) {

     $id = $_POST['id'];
     $product = $connect->query("SELECT * FROM products WHERE id = '$id'");
     $product = $product->fetch(PDO::FETCH_ASSOC);

     if (isset($_SESSION['cart'][$id])) {
         $_SESSION['cart'][$id]['quantity'] += 1;
     } else {
         $_SESSION['cart'][$id] = [
             'title' => $product['title'],
             'price' => $product['price'],
             'rus_name' => $product['rus_name'],
             'img' => $product['img'],
             'quantity' => 1,
         ];
    }


      $_SESSION['totalQuantity'] = $_SESSION['totalQuantity'] ? $_SESSION['totalQuantity'] += 1 : 1;
      $_SESSION['totalPrice'] = $_SESSION['totalPrice'] ? $_SESSION['totalPrice'] += $product['price'] : $product['price'];
 }


 header("location:" . $_SERVER['HTTP_REFERER']);