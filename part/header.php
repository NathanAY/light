<?php
session_start();
require_once('connect.php');
$cats = $connect->query('SELECT * FROM cat')->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/nav.css">
    <title>HomeLight</title>
</head>
<body>
<div class="head">
    <div class="menutext">
        <?php if (isset($_SESSION['userName'])) {
            echo '<div class="menuitem">
                            <a href="../actions/logout.php" type="submit"><i class="fa fa-user" aria-hidden="true">
                                </i>Выход ' . $_SESSION['userName'] . '</a>
                    </div>';
        } else {
            echo '<div class="menuitem"><a href="authorization.php"><i class="fa fa-user" aria-hidden="true"></i> Вход </a></div>';
        } ?>
        <div class="menuitem"><a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Корзина
                (Товаров <?php if (isset($_SESSION['totalQuantity'])) {
                    echo $_SESSION['totalQuantity'];
                } else {
                    echo '0';
                } ?>
                На сумму <?php if (isset($_SESSION['totalPrice'])) {
                    echo $_SESSION['totalPrice'];
                } else {
                    echo '0';
                } ?> руб.)</a></div>
    </div>
</div>

<div class="logoblock">
    <img class="logo" src="img/logo.png" alt="logo">
    <img class="allday" src="img/24.png" alt="24/7">
    <div class="tel">Телефон: <b>8-(473)-258-25-35</b><br>Телефон: <b>8-(___)-___-__-__</b></div>

    <nav class="menu ">
        <a href="index.php" class="menui"><i class="fa fa-file-text-o" aria-hidden="true"></i>На главную</a>
        <a href="catalog.php" class="menui"><i class="fa fa-list" aria-hidden="true"></i>Каталог</a>
        <a href="#3" class="menui"><i class="fa fa-truck" aria-hidden="true"></i>Доставка и оплата</a>
        <a href="#4" class="menui"><i class="fa fa-telegram" aria-hidden="true"></i></i>Контакты</a>
        <a href="#5" class="menui"><i class="fa fa-address-book-o" aria-hidden="true"></i>О нас</a>
        <?php if ($_SESSION['isAdmin'] == 1) {
            echo '<a href="addProduct.php" class="menui"><i class="fa fa-list" aria-hidden="true"></i>Добавить товар</a>
                        <a href="adminRight.php" class="menui"><i class="fa fa-list" aria-hidden="true"></i>Админ права</a>';
        } ?>
    </nav>
</div>