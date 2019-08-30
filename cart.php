<?php
include_once('part/header.php');
echo '<link rel="stylesheet" href="../CSS/forms.css">';
?>
    <div class="content">
                    <?php if (isset($_SESSION['order'])) {?>
                <h2 class="havebuy"> Ваш заказ под номером <?php echo $_SESSION['order']?> принят.</h2>
        <?} ?>
        <div class="cartlist">
            <?php if (sizeof($_SESSION['cart']) > 0) {
                foreach ($_SESSION['cart'] as $key => $product) { ?>
                    <div class="cartProduct">
                        <form action="actions/delete.php" method="POST">
                            <input type="hidden" name="delete" value="<?php echo $key ?>">
                            <input type="submit" value="Удалить">
                        </form>
                        <a href="product.php?product=<?php echo $product['title'] ?>">
                            <img src="<?php echo $product['img'] ?>" alt="photo"></a>
                        <div class="text"><b><?php echo $product['rus_name'] ?> Товар в
                                количестве: <?php echo $product['quantity'] ?> на
                                сумму <?php echo $product['quantity'] * $product['price'] ?> руб</b>

                        </div>
                    </div>
                <?php } ?>
                <form class="formmail" action="actions/mail.php" class="buy" method="POST">
                    Выберите способ оплаты:
                    <select name="paytype" id="paytype">
                        <option value="Наличными курьеру">Наличными курьеру</option>
                        <option value="Самовывоз">Самовывоз</option>
                        <option value="Почта россии">Почта россии</option>
                        <option value="На коллективную карту">На коллективную карту</option>
                    </select>
                    Cпособ доставки:
                    <select name="transtype" id="paytype">
                        <option value="Почта россии">Почта россии</option>
                        <option value="Курьерская доставка">Курьерская доставка</option>
                        <option value="Самовывоз">Самовывоз</option>
                    </select>
                    Введите имя: <input type="text" name="username" required placeholder="введите имя">
                    Введите email: <input type="text" name="email" required placeholder="введите email">
                    Введите номер телефона:<input type="text" name="phone" required placeholder="Введите телефон">
                    <input type="submit" name="order" value="Заказать">
                </form>

                <hr> <?php } else {
                echo '<div class="empty">Корзина пуста</div>';
            }
            ?>
        </div>
    </div>
<!--    <div class="clearcart">-->
<!--        <form action="">-->
<!--            <input type="submit" value="Очистить корзину">-->
<!--        </form>-->
<!--    </div>-->

<?php require_once('part/footer.php') ?>