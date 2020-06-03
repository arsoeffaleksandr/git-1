<!DOCTYPE html>
<html>
<head>
<?php
 
  require 'blocks/head.php';

?>

</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Company name</h5>
  <nav class="my-2 my-md-0 mr-md-3" style="display: flex;">
    <a class="p-2 text-dark" href="/">Главная</a>
    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Каталог товаров
      <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li><a href="?dio=3">android</a></li>
        <li><a href="?jojo=4">apple</a></li>
        <li><a href="?all">Все</a></li>
      </ul>
    </div>
    <a class="p-2 text-dark" href="/cart.php" >
      <img src="img/cart.svg">
      <span class="badge">0
                  </span>
    </a>
  </nav>
  <?php
        if ($_COOKIE['login'] == '') :
  ?>
  <a class="btn btn-outline-primary mr-2 mb-2" href="/auth.php">Войти</a>
  <a class="btn btn-outline-primary  mb-2" href="/reg.php">Регистрация</a>
  <a class="btn btn-outline-primary  mb-2" href="/admin.php">Войти в админ панель</a>
  <?php
    else:
  ?>
  <a class="btn btn-outline-primary  mb-2" href="auth.php">Кабинет пользователя</a>
  <?php
    endif;
  ?>
  <
</div>

<div class="album py-5 bg-white">
    <div class="container">
        <div class="row">
          <?php

          ?>
          <?php
          	require 'mysql_connect.php';
          	if (isset($_GET['dio'])) {
          		$catid = $_GET['dio'];
          		$sql = "SELECT * FROM products WHERE category_id=$catid";
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
          	}
          	elseif (isset($_GET['jojo'])) {
          		$cated_id = $_GET['jojo'];
          		$sql = "SELECT * FROM products WHERE category_id=$cated_id";
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

          	}
          	elseif (isset($_GET['all'])) {
          		$sql = 'SELECT * FROM `products` ORDER BY `id` DESC';
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

          	}
            // require 'mysql_connect.php';
            // $sql = 'SELECT * FROM `products` ORDER BY `id` DESC';
            // $query = $pdo->query($sql);
            // while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            //   echo "<div class='col-md-6'>
            //           <div class='card mb-4 shadow-sm'>
            //             <img width='auto' height='400' src='$row->image'>
            //             <div class='card-body'>
            //               <p class='card-text'>
            //               <h3>$row->name</h3>
            //               </p>
            //               <div class='d-flex justify-content-between align-items-center'>
            //                 <div class='btn-group'>
                  
            //                   <button type='button' class='add-to-cart btn btn-sm btn-outline-secondary' id='$row->id'>Добавить в корзину</button>
          
            //                   <a href='good.php?id=$row->id' title='$row->name'>
            //                     <button type='button' class='btn btn-sm btn-outline-secondary'>Подробнее</button>
            //                   </a>
                              
            //                 </div>
            //                 <small class='text-muted'>Цена: $row->price</small>
            //               </div>
            //             </div>
            //           </div>
            //         </div>";
            // }
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