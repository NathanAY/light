<?php include_once('part/header.php');
?>
<?php
if ($_SESSION['isAdmin'] == 1) {
    echo '<link rel="stylesheet" href="../CSS/forms.css">';
    echo '<div class="container center">
        <form action="admin/addProductAction.php" method="post">
            <!-- Default form contact -->
            <form class="text-center border border-light p-5">

                <p>Категория</p>
                <select name="cat">';
    foreach ($cats as $category) {
        echo '<option value="' . $category['name'] . '" selected>' . $category['rus_name'] . '</option> ';
    }
    echo '
                </select>

                <input type="text" placeholder="Цена" name="price">
                <input type="text" placeholder="Название" name="rus">
                <input type="text" placeholder="Пример: https://i.imgur.com/8RQJrXF.jpg" name="img">
                <input type="text" placeholder="Тип" name="type">
                <input type="text" placeholder="Вес" name="mass">
                <input type="text" placeholder="Ширина" name="width">
                <input type="text" placeholder="Высота" name="height">
                <input type="text" placeholder="Материал" name="material">

                <!-- Send button -->
                <button class="submitButton" type="submit">Create</button>
            </form>
            <!-- Default form contact -->
        </form>
    </div>';
    require_once('part/footer.php');
} else {
    echo '<script type="text/javascript">location.replace("/404.php");</script>';
} ?>
<?php require_once('part/footer.php') ?>