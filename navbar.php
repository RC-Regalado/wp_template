<!-- Page Preloder -->
<div id="preloder">
  <div class="loader"></div>
</div>
<!-- Header Section Begin -->
<header class="header">
  <div class="header__top">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="header__top__left"></div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="header__top__right">
            <div class="header__top__right__language">
              <div>Español</div>
              <span class="arrow_carrot-down"></span>
              <ul>
                <li><a href="#">Español</a></li>
                <li><a href="#">English</a></li>
              </ul>
            </div>
            <?php if (!is_user_logged_in()) { ?>
            <div class="header__top__right__auth">
              <a href="/login"><i class="fa fa-user"></i> Login</a>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <div>
              <a class="nav-link active" aria-current="page" href="/">Inicio</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/tienda">Tienda</a>
          </li>
        </ul>
        <form class="d-flex" role="search" action="/tienda">
          <input
            class="form-control me-2"
            type="search"
            placeholder="Buscar"
            aria-label="Buscar"
            name="search"
          />
          <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
        <li class="nav-item">
            <div class="header__cart">
              <ul>
                <li>
                  <a href="/carrito"
                    ><i class="fa fa-shopping-bag"></i>
                    <span>
                      <?php
                            $count = WC()->cart->get_cart_contents_count(); echo
                      $count; ?>
                    </span></a
                  >
                </li>
              </ul>
              <div class="header__cart__price">
                Total:
                <span>
                  <?php
                              $total = WC()->cart->get_total(); echo $total; ?>
                </span>
              </div>
            </div>
          </li>

      </div>
    </div>
  </nav>
</header>