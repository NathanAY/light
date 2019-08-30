<?php include_once('part/header.php');

$data = $_POST;
if (isset($data['do_registr'])) {
    $name = $data['login'];
    $password = $data['password'];
    $password2 = $data['password_2'];
    $errors = array();
    if (trim($name) == '') {
        $errors[] = 'Введите логин!';
    }
    if ($password == '') {
        $errors[] = 'Введите пароль!';
    }
    if ($password2 == '') {
        $errors[] = 'Повторите пароль!';
    }
    if (strlen($password) < 6) {
        $errors[] = 'Пароль должен быть длиннее 6 символов!';
    }
    if ($password2 != $password) {
        $errors[] = 'Пароли не совпадают!';
    }
    if (empty($errors)) {
        $userCount = $connect->query("SELECT count(*) FROM `users` where login = '$name'");
        $userCount = $userCount->fetchColumn(0);
        if ($userCount == 1) {
            $errors[] = 'Пользователь с таким логином уже существует!';
        }
    }
    if (empty($errors)) {
        $hashed_password = password_hash($password,PASSWORD_DEFAULT);
        $connect->exec("INSERT INTO `users` (`login`, `password`) VALUES ('$name', '$hashed_password');");
        echo '<div style="color: green">Success</div><hr>';
    } else {
        echo '<div style="color: red;">' . array_shift($errors) . '</div><hr>';
    }
}
 ?>

 <div class="content">
		<div class="reg ">
			<div class="regname">
				<p>Регистрация</p>
			</div>
			<form action="register.php" method="POST">
				<p>Введите логин: <input type="text" name="login" placeholder="Логин" value = "<?php echo $name;?>"</p>
				<p>Введите пароль: <input type="password" name="password" placeholder="Пароль" value = "<?php echo $password;?>"></p>
                <p>Повторите пароль: <input type="password" name="password_2" placeholder=""></p>
				<input type="submit" name="do_registr">
			</form>
			<a href="authorization.php">Авторизация</a>
		</div>
 </div>

<?php require_once('part/footer.php') ?>