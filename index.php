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
						echo "<h2>$row->title</h2>
								<p>$row->intro</p>

								<p><b>Автор сатьи:</b><mark>$row->avtor</mark></p>
								<a href='news.php?id=$row->id' title='$row->title'>
								<button class='btn btn-warning'>Прочитать больше</button>
								</a>";
					}
				?>
			</div>
			
		</div>

	</main>

</body>
</html>