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
					$sql = 'SELECT * FROM `articles` ORDER BY `date` DESC';
					$query = $pdo->query($sql);
					while ($row = $query->fetch(PDO::FETCH_OBJ)) {
						$date = date('d ', $row->date);
						$array = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа',
						'сентября', 'октября', 'ноября', 'декабря'];
						$date .= $array[date(' n' , $row->date) - 1];
						$date .= date(' H:i', $row->date);
						echo "
								<div class='col-md-6'>
							      <div class='row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative'>
							        <div class='col p-4 d-flex flex-column position-static'>
							          <h3 class='mb-0'>$row->title</h3>
							          <div class='mb-1 text-muted'>$date</div>
							          <p class='card-text mb-auto'>$row->intro.</p>
							          <a href='news.php?id=$row->id' title='$row->title' class='stretched-link'>Прочитать больше</a>
							        </div>
							        <div class='col-auto d-none d-lg-block'>
							          <img src ='$row->image' class='bd-placeholder-img' width='200' height='200' xmlns='http://www.w3.org/2000/svg' preserveAspectRatio='xMidYMid slice' focusable='false' role='img' aria-label='Placeholder: Thumbnail'><title>Placeholder</title><rect width='100%' height='100%' fill='#55595c'></rect>
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