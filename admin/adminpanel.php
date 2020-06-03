<?php
	if ($_COOKIE['login'] == '') {
		header('Location: reg.php');
		exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatable" content="ie=edge">
<title>document</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="icon" href="img/glasses.ico">
<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
	<?php require '../blocks/header.php';?>

	<main class="container mt-5">
		<div class="row">
			<div class="col-md-8 mb-3">
				<h4>Добавление товара</h4>
				<form action="" method="post">
					<label for="text">категория</label>
					<textarea name="text" id="category_id" class="form-control"></textarea>

					<label for="title">Название</label>
					<input type="text" name="title" id="name" class="form-control">

					<label for="text">описание</label>
					<textarea name="text" id="description" class="form-control"></textarea>

					<label for="text">цена</label>
					<textarea name="text" id="price" class="form-control"></textarea>

					<label for="text">ссылка на фото</label>
					<textarea name="text" id="image" class="form-control"></textarea>

					<div class="alert alert-danger mt-2" id="errorBlock">s</div>

					<button type="button" id="article_send" class="btn btn-success mt-3">
					Добавить</button>
				</form>
			</div>
		</div>
	</main>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
		$('#article_send').click(function () {
			var category_id = $('#category_id').val();
			var name = $('#name').val();
			var description = $('#description').val();
			var price = $('#price').val();
			var image = $('#image').val();
			$.ajax({
				url: '../admin/adminavt.php',
				type: 'POST',
				cache: false,
				data: {'category_id' : category_id, 'name' : name, 'description' : description, 'price' : price, 'image' : image},
				dataType: 'html',
				success: function(data) {
					if (data == 'Готово') {
						$('#article_send').text('Все готово');
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