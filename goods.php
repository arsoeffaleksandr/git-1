<!DOCTYPE html>
<html>
<head>
<?php
 
  require 'blocks/head.php';

?>

</head>
<body>
<?php
    require 'blocks/header.php';
?>

<div class="album py-5 bg-white">
    <div class="container">
        <div class="row">
          <?php
            require 'mysql_connect.php';
            $sql = 'SELECT * FROM `products` ORDER BY `id` DESC';
            $query = $pdo->query($sql);
            while ($row = $query->fetch(PDO::FETCH_OBJ)) {
              echo "<div class='col-md-6'>
                      <div class='card mb-4 shadow-sm'>
                        <img width='537' height='400' src='$row->image'>
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

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
            $('.add-to-cart').click(function () {
              var id = $(this).attr('id');
              $.ajax({
                url: 'cart.php',
                type: 'POST',
                cache: false,
                data: {'id' : id},
                dataType: 'html',
                success: function(data) {
                  if (data == 'Готово') {
                    $('.add-to-cart').text('Все готово');
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
      </div>
    </div>
  </div>

</body>
</html>
<a href='news.php?id=$row->id' title='$row->title'>
  <button type='button' class='btn btn-sm btn-outline-secondary'>Подробнее</button>
</a>";