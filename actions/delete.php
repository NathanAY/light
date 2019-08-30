<?php
session_start();

if (isset($_POST['delete'])) {
    $id = $_POST['delete'];

    $_SESSION['totalQuantity'] -= $_SESSION['cart'][$id]['quantity'];
    $_SESSION['totalPrice'] -= $_SESSION['cart'][$id]['price'] * $_SESSION['cart'][$id]['quantity'];

    unset($_SESSION['cart'][$id]);

    header("location:" . $_SERVER['HTTP_REFERER']);

}

