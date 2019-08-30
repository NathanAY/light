<?php include_once('part/header.php');

$data = $_POST;
if (isset($data['do_login'])) {
    $name = $data['login'];
    $password = $data['password'];
    $errors = array();
    if (trim($name) == '') {
        $errors[] = 'Введите логин!';
    }
    if ($password == '') {
        $errors[] = 'Введите пароль!';
    }
    if (empty($errors)) {
        $user = $connect->query("SELECT * FROM `users` where login = '$name'")->fetchAll(PDO::FETCH_ASSOC);
        $hashed_password = $user[0]['password'];
        if (count($user) != 1 || !password_verify($password, $hashed_password)) {
            $errors[] = 'Неверный логин или пароль!';
        } else {
            $isAdmin = $user[0]['is_admin'];
            echo $isAdmin;
            $_SESSION['userName'] = $name;
            $_SESSION['isAdmin'] = $isAdmin;
        }
    }
    if (empty($errors)) {
        echo '<div style="color: green">Success</div><hr>';
        echo '<script type="text/javascript">location.replace("/");</script>';
    } else {
        echo '<div style="color: red;">' . array_shift($errors) . '</div><hr>';
    }



    $hashed_password = password_hash('root1ff',PASSWORD_DEFAULT);
    if(password_verify('root1',$hashed_password))
        echo "Welcome";
    else
        echo "Wrong Password";
}
?>

 <div class="content">
		<div class="reg ">
			<div class="regname">
				<p>Авторизация</p>
			</div>
			<form action="authorization.php" method="POST">
				<p>Введите логин: <input type="text" name="login" placeholder="Логин" value="<?php echo $name;?>"</p>
				<p>Введите Пароль: <input type="password" name="password" placeholder="Пароль"></p>
				<input class="button" type="submit" name="do_login">
			</form>
			<a href="register.php">Зарегестрироватся</a>
		</div>
 </div>

<?php require_once('part/footer.php') ?>