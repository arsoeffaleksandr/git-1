<!DOCTYPE html>
<html>
<head>
<?php
    $website_title = "Online-shop";
    require 'blocks/head.php';
    require 'mysql_connect.php';
	$sql = 'SELECT * FROM `products` ORDER BY `id` DESC';
	$query = $pdo->query($sql);
	$row = $query->fetch(PDO::FETCH_OBJ);
	$arr = [
		'id' => $row->id ,
		'name' => $row->name ,
		'description' => $row->description ,
		'price' => $row->price
	];
?>
</head>
<body>
<?php
    require 'blocks/header.php';
?>
	<main class="container">
		<div class="row">
			
			<!-- 	<?php
						$date = date('d ', $row->date);
						$array = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа',
						'сентября', 'октября', 'ноября', 'декабря'];
						$date .= $array[date(' n' , $row->date) - 1];
						$date .= date(' H:i', $row->date);
				?> -->
				<div class='col-md-6'>
                  <div class='card mb-4 shadow-sm'>
                    <img width='auto' height='400' id='image' src='<?=$row->image?>'>
                    <div class='card-body'>
                      <p class='card-text'>
                      <h3 id='name'><?=$row->name?></h3>
                      </p>
                      <div class='d-flex justify-content-between align-items-center'>
                        <div class='btn-group'>
              
                          <button type='button' class='add-to-cart btn btn-sm btn-outline-secondary' id="add-to-cart">Добавить в корзину</button>
      						
                          <a href='good.php?id=$row->id' title='$row->name'>
                            <button type='button' class='btn btn-sm btn-outline-secondary'>Подробнее</button>
                          </a>
                          
                        </div>
                        <small class='text-muted' id='price'>">Цена: <?=$row->price?></small>
                      </div>
                    </div>
                  </div>
                </div>
			</div>
			
		</div>
	</main>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
		$('#add-to-cart').click(function () {
			var image = <?php echo json_encode($row->image);?>;
			var name = <?php echo json_encode($row->name);?>;
			var description = <?php echo json_encode($row->description);?>;
			var price = <?php echo json_encode($row->price);?>;

			$.ajax({
				url: 'ajax/add_product.php',
				type: 'POST',
				cache: false,
				data: {'image' : image, 'name' : name, 'price' : price},
				dataType: 'html',
				success: function(data) {
					if (data == 'Готово') {
						$('#add-to-cart').text('Все готово');
						$('#errorBlock').hide();
					}
					else {
						$('#errorBlock').show();
						$('#errorBlock').text(data);
					}
				}
			});
		});
	</script>
   
</body>
</html>