<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Company name</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="/">Главная</a>
    <div class="btn-group">
      <a type="button" href="/goods.php?all" class="btn btn-danger">Товары</a>
      <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="/goods.php?dio=3">android</a>
        <a class="dropdown-item" href="/goods.php?jojo=4">apple</a>
        <a class="dropdown-item" href="/goods.php?all">Все</a>
        <div class="dropdown-divider"></div>
      </div>
    </div>
    <a class="p-2 text-dark" href="/cart.php" >
      <img src="img/cart.svg">
      <span class="badge">0
                  </span>
    </a>
  </nav>
  <form class="form-inline" method="post" action="search.php">
      <input class="form-control mr-sm-2" type="search" name="search_q" placeholder="Поиск" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
  </form>
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

