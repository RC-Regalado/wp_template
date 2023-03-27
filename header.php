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
		<?php get_template_part('navbar'); ?>
	</header>
