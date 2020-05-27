<?php
	$image = trim($_POST['image']);
	$name = trim($_POST['name']);
	$price = trim($_POST['price']);

	$error = '';



    require '../mysql_connect.php';

	$sql = 'INSERT INTO cart(image, name, price) VALUES(?, ?, ?)';
	$query = $pdo->prepare($sql);
	$query->execute([$image, $name, $price]);


	echo "Готово";
?>