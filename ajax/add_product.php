<?php
	$id = trim($_POST['id']);
	$image = trim($_POST['image']);
	$name = trim($_POST['name']);
	$price = trim($_POST['price']);

	$error = '';



    require '../mysql_connect.php';

	$sql = 'INSERT INTO cart(id, image, name, price) VALUES(?, ?, ?, ?)';
	$query = $pdo->prepare($sql);
	$query->execute([$id, $image, $name, $price]);


	echo "Готово";
?>