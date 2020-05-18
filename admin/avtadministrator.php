<?php
	$login = trim ($_POST['login']);
	$pass = trim ($_POST['pass']);

	$error = '';

	if(strlen($login) <= 3)
		$error = 'Введите логин';
	else if (strlen($pass) <= 3) 
		$error = 'Введите пароль';

	if ($error != '') {
		echo $error;
		exit();
	}

	require '../mysql_connect.php';

	$sql = 'SELECT `id` FROM `admin` WHERE `login` = :login && `pass` = :pass';
	$query = $pdo->prepare($sql);
	$query->execute(['login' => $login, 'pass' => $pass]);

	$user = $query->fetch(PDO::FETCH_OBJ);
	if($user->id == 0){
		echo "Такого пользователя не существует";
	}else {
		setcookie('login', $login, time() + 3600 * 24 * 30, "/");
		echo 'Готово';
	}
	
?>