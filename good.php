<!DOCTYPE html>
<html>
<head>
<?php
 	require 'mysql_connect.php';

	$sql = 'SELECT * FROM `products` WHERE `id` = :id';
	$id = $_GET['id'];
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
					
				</div>
				<h3 class="mt-5">Комментарии</h3>
				<form action="good.php?id=<?=$_GET['id']?>" method="post">
					<label for="username">Введите ваше имя</label>
					<input type="text" name="username" value="<?=$_COOKIE['login']?>" id="username" class="form-control">

					<label for="mess">Сообщение</label>
					<textarea name="mess" id="mess" class="form-control"></textarea> 

					<div class="alert alert-danger mt-2" id="errorBlock">s</div>

					<button type="submit" id="mess_send" class="btn btn-success mt-3">
						Добавить комментарий
					</button>
				</form>
				<?php
					if ($_POST['username'] != '' && $_POST['mess'] != '') {
						$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
						$mess = trim(filter_var($_POST['mess'], FILTER_SANITIZE_STRING));

						$sql = 'INSERT INTO comments(name, mess, article_id) VALUES(?, ?, ?)';
						$query = $pdo->prepare($sql);
						$query->execute([$username, $mess, $_GET['id']]);
					}

					$sql = 'SELECT * FROM `comments` WHERE `article_id` = :id ORDER BY `id` DESC';
					$query = $pdo->prepare($sql);
					$query->execute(['id' => $_GET['id']]);
					$comments = $query->fetchALL(PDO::FETCH_OBJ);

					foreach ($comments as $comment) {
						echo "<div class='alert alert-info mb-3'>
							<h4>$comment->name</h4>
							<p>$comment->mess</p>
						</div>";
					}
				?>
			</div>
	</main>
</body>
</html>