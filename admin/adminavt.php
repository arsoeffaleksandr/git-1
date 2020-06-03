<?php
	$category_id = trim($_POST['category_id']);
	$name = trim($_POST['name']);
	$description = trim($_POST['description']);
	$price = trim($_POST['price']);
	$image = trim($_POST['image']);
	$error = '';


    require '../mysql_connect.php';

	$sql = 'INSERT INTO products(category_id, name, description, price, image) VALUES(?, ?, ?, ?, ?)';
	$query = $pdo->prepare($sql);
	$query->execute([$category_id, $name, $description, $price, $image]);

	echo "Готово";
?>