<?php
require_once '../connect.php';
try {
    $userId = $_POST['userId'];
    $action = $_POST['action'] == "add" ? 1 : 0;
    echo '<h3>'.$userId.$action.'</h3>';
    $connect->exec("UPDATE `users` SET `is_admin` = '$action' WHERE (`id` = '$userId');");
    echo '<script type="text/javascript">location.replace("/adminRight.php");</script>';
}
catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
?>