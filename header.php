<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/js/bootstrap.bundle.min.js'; ?>">
	</script>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/css/bootstrap.min.css'; ?>">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
</head>
<body <?php body_class(); ?>>
	<header id="header" class="jumbotron">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand header-logo" href="/">
				<img src="<?php echo get_template_directory_uri().'/logo.png'; ?>">
			</a>

			<div class="collapse navbar-collapse" id="navbarNav">
	    		<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="/">Inicio</a>
					</li>
			    	<li class="nav-item">
	        			<a class="nav-link" href="#">Productos</a>
    	  			</li>
      				<li class="nav-item">
        				<a class="nav-link" href="#">Servicios</a>
      				</li>
	    		</ul>

    			<ul class="navbar-nav ml-auto">
      				<li class="nav-item">
       					<a class="nav-link" href="#">Iniciar sesión</a>
      				</li>
	      			<li class="nav-item">
    	    			<a class="nav-link" href="#">Registrarse</a>
      				</li>
    			</ul>
  			</div>
		</nav>
	</header>
<div class="container">
