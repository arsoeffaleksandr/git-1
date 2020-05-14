<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Company name</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="/">Главная</a>
    <a class="p-2 text-dark" href="goods.php">Товары</a>
    <a class="p-2 text-dark" href="cart.php" >
      <img src="img/cart.svg">
      <span class="badge">0
                  </span>
    </a>
  <?php
        if ($_COOKIE['login'] == '') :
  ?>
 	<a class="btn btn-outline-primary mr-2 mb-2" href="auth.php">Войти</a>
  <a class="btn btn-outline-primary  mb-2" href="reg.php">Регистрация</a>
  <?php
    else:
  ?>
  <a class="btn btn-outline-primary  mb-2" href="auth.php">Кабинет пользователя</a>
  <?php
    endif;
  ?>
</div>