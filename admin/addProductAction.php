<?php
require_once '../connect.php';
try {
    $cat = $_POST['cat'];
    $price = $_POST['price'];
    $rus = $_POST['rus'];
    $title = str_replace(" ","", $rus);
    $img = $_POST['img'];
    $type = $_POST['type'];
    $mass = $_POST['mass'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $material = $_POST['material'];
    $description = $_POST['description'];

    $sql = "INSERT INTO `products` (`title`, `cat`, `price`, `rus_name`, `img`, `type`, `mass`, `width`, `height`, `material`)
 VALUES ('$title', '$cat', '$price', '$rus', '$img', '$type', '$mass', '$width', '$height', '$material');";
    $connect->exec($sql);
    header('Location: /addProduct.php');
}
catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

?>