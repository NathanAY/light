<?php
//require_once('../connect.php');
unset($_SESSION['userName']);
unset($_SESSION['isAdmin']);
$_SESSION['userName'] = 'd';
session_start();
$_SESSION = array();
session_destroy();
header('Location: /');
?>
