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
			                  
			                              <button type='button' class='add-to-cart btn btn-sm btn-outline-secondary' id='$row->id'>Добавить в корзину</button>
			          
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