<?php
	$title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
	$intro = trim(filter_var($_POST['intro'], FILTER_SANITIZE_STRING));
	$text = trim($_POST['text']);

	$error = '';

	if(strlen($title) <= 3)
		$error = 'Введите заголовок статьи';
	else if(strlen($intro) <= 3)
		$error = 'Введите интро статьи';
	else if(strlen($text) <= 3)
		$error = 'Введите текст статьи';

	if ($error != '') {
		echo $error;
		exit();
	}

    require '../mysql_connect.php';

	$sql = 'INSERT INTO articles(title, intro, text, date, avtor) VALUES(?, ?, ?, ?, ?)';
	$query = $pdo->prepare($sql);
	$query->execute([$title, $intro, $text, time(), $_COOKIE['login']]);

	echo "Готово";
?>