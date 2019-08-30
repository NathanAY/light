<?php
session_start();
require_once ('../connect.php');

if (isset($_POST['order'])) {
//echo "<pre>";
//    var_dump($_POST);
//echo "</pre>";


    $paytype = $_POST['paytype'];
    $transtype = $_POST['transtype'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $connect->query("INSERT INTO `order` (trans, email, phone, username, paytype) VALUES ('$transtype','$email','$phone','$username', '$paytype')");

    $lastid = $connect->query("SELECT MAX(id) FROM `order` WHERE email = '$email'");
    $lastid = $lastid->fetch(PDO::FETCH_ASSOC);
    $lastid = $lastid['MAX(id)'];

    $message = '<h1>' . "Здравствуйте, ваш заказ под номером {$lastid} принят." . '</h1><br><br>';
    $message .= "Товаров в корзине: {$_SESSION['totalQuantity']} шт." . '<br>';
    $message .="Состав заказа:" . '<br><br>';
    foreach ($_SESSION['cart'] as $product) {
        $message .= "- {$product['rus_name']} в количестве {$product['quantity']} шт." . '<br>';
    }
    $message .= '<br>';
    $message .= '<h2>' . "Сумма заказа {$_SESSION['totalPrice']} рублей." . '</h2><br>';
    $message .= '<h2>'. "Выбранный способ оплаты: {$paytype} ." . '<h2>';
    $message .= '<h2>'. "Выбранный способ доставки: {$transtype}." . '<h2>';
    $message .= '<h3>' . "Вскоре с вами свяжутся по указанному вами телефону: $phone." . '</h3>';
}

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

$subject = "Здравствуйте $username ваш заказ под номером $lastid принят.";


mail($email, $subject, $message, $headers);
unset ($_SESSION['totalQuantity']);
unset ($_SESSION['totalPrice']);
unset ($_SESSION['cart']);

$_SESSION['order'] = $lastid;

header("location:{$_SERVER['HTTP_REFERER']}");
