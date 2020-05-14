<!DOCTYPE html>
<html>
<head>
<?php
	$login = $_POST['id'];
	$pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

	
 	require 'mysql_connect.php';

	$sql = 'SELECT * FROM `products` WHERE `id` = :id';
	$query = $pdo->prepare($sql);
	$query->execute(['id' => $id]);

	$products = $query->fetch(PDO::FETCH_OBJ);

	$website_title = 'Подробнее';	
	require 'blocks/head.php';

?>
</head>
<body>
	<?php require 'blocks/header.php';?>

	<main class="container mt-5">
		<div class="row">
					<div class='col-md-8'>
                      <div class='card mb-4 shadow-sm'>
                        <img width='537' height='400' src='<?=$products->image?>'>
                        <div class='card-body'>
                          <p class='card-text'>
                          <h3><?=$products->name?></h3>
                          <p><?=$products->description?></p>
                          </p>
                          <div class='d-flex justify-content-between align-items-center'>
                            <div class='btn-group'>
                              <button type='button' class='btn btn-sm btn-outline-secondary'>Добавить в корзину</button>
                            </div>
                            <small class='text-muted'>Цена:<?=$products->price?></small>
                          </div>
                        </div>
                      </div>
                    </div>
					

				?>
			</div>
	</main>
</body>
</html>