<?php include_once('part/header.php');
?>
<?php
if ($_SESSION['isAdmin'] == 1) {
    $users = $connect->query("SELECT * FROM `users`")->fetchAll(PDO::FETCH_ASSOC);
    echo '<link rel="stylesheet" href="../CSS/forms.css">';
    echo '<div class="container center">';
    foreach ($users as $user) {
        if ($user['login'] != $_SESSION['userName']) {
            echo '<form action="admin/adminRightAction.php" method="post"><ul class="nab">';
            echo '<p>Id: ' . $user['id'] . '</p>';
            echo '<p>Логин: ' . $user['login'] . '</p>';
            echo '<input class="tryHidden" name="userId" value="' . $user['id'] . '"/>';
            if ($user['is_admin'] == 0) {
                echo '<button class="submitButton" name="add">Сделать админом</button>';
                echo '<input class="tryHidden" name="action" value="add"/>';
            } else {
                echo '<button class="submitButton red" name="remove">Удалить права админа</button>';
                echo '<input class="tryHidden" name="action" value="remove"/>';
            }
            echo '</ul></form>';
        }
    }
    echo '</div>';
    require_once('part/footer.php');
} else {
    echo '<script type="text/javascript">location.replace("/404.php");</script>';
} ?>
<?php require_once('part/footer.php') ?>