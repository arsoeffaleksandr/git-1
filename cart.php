<!DOCTYPE html>
<html>
<head>
<?php
    $website_title = "Online-shop";
    require 'blocks/head.php';


?>
</head>
<body>
<?php
    require 'blocks/header.php';
?>
	<main class="container">
		<div class="row">
				<?php
						$user = 'naruto';
						$password = 'naruto';
						$db = 'shop';
						$host = 'localhost';

						$dsn = 'mysql:host='.$host.';dbname='.$db;
						$link = mysqli_connect($host, $user, $password, $db);
						if (isset($_GET['del'])) {
							$id = $_GET['del'];
							$query = "DELETE FROM cart WHERE id=$id";
							mysqli_query($link, $query);
						}
						// $pdo = new PDO($dsn, $user, $password);

				?>
				<?php
					require 'mysql_connect.php';

					$sql = 'SELECT * FROM `cart` ORDER BY `id` DESC';
					$query = $pdo->query($sql);
					while ($row = $query->fetch(PDO::FETCH_OBJ)) {
						echo "<div class='col-md-6'>
			                      <div class='card mb-4 shadow-sm'>
			                        <img width='auto' height='400' src='$row->image'>
			                        <div class='card-body'>
			                          <p class='card-text'>
			                          <h3>$row->name</h3>
			                          </p>
			                          <div class='d-flex justify-content-between align-items-center'>
			                            <div class='btn-group'>
			                 			  <a href='?del=$row->id'>
			                              	<button type='button' class='add-to-cart btn btn-sm btn-outline-secondary' id='$row->id'>убрать из корзины</button>
			          					  </a
			                              <a href='good.php?id=$row->id' title='$row->name'>
			                                <button type='button' class='btn btn-sm btn-outline-secondary'>Подробнее</button>
			                              </a>
			                              
			                            </div>
			                            <small class='text-muted'>Цена: $row->price</small>
			                          </div>
			                        </div>
			                      </div>
			                    </div>";
							}
				?>
			</div>
			
		</div>
	</main>

</body>
</html>