<?php

	$user = 'naruto';
	$password = 'naruto';
	$db = 'shop';
	$host = 'localhost';

	$dsn = 'mysql:host='.$host.';dbname='.$db;
	$pdo = new PDO($dsn, $user, $password);


?>