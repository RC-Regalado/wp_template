<!-- Page Preloder -->
<div id="preloder">
  <div class="loader"></div>
</div>
<!-- Header Section Begin -->
<header class="header">
  <div class="header__top">
    <div class="container">
      <div class="row navbar-top">
        <div class="col-lg-6 col-md-6">
          <div class="header__top__right">
            <?php if (!is_user_logged_in()) { ?>
              <div class="header__top__right__language">
                <a href="/login"> Ingresa o</a>
              </div>
              <div class="header__top__right__auth">
                <a href="/register">Registrate</a>
              </div>
            <?php } else {
              global $current_user;
              wp_get_current_user();
            ?>
              <div class="header__top__right__auth">
                <div class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user"></i><?php echo $current_user->user_login; ?>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                      <?php
                      if (current_user_can('manage_woocommerce')) {
                        echo '<a class="dropdown-item" href="/wp-admin">Perfil</a>';
                      } else {
                        echo '<a class="dropdown-item" href="/mi-cuenta">Perfil</a>';
                      } ?>
                    </li>
                    <li>
                      <hr class="dropdown-divider" />
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?php echo wp_logout_url(home_url()); ?>">Cerrar sesión</a>
                    </li>
                  </ul>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar">
    <div class="container-fluid">
      <div class="row">
        <a class="navbar-brand col" href="/">
          <img src="<?php echo get_template_directory_uri() . '/logo.png' ?>" />
        </a>
        <div class="header__cart col">
          <!-- Cart Data {{{ -->
          <a href="/carrito"><i class="fa fa-shopping-bag"></i>
            <span>
              <?php
              $count = WC()->cart->get_cart_contents_count();
              echo
              $count; ?>
            </span></a>
          <div class="header__cart__price">
            Total:
            <span>
              <?php
              $total = WC()->cart->get_total();
              echo $total; ?>
            </span>
          </div>
          <!-- }}} -->
        </div>
      </div>
    </div>
  </nav>
</header>
