<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/css/header.css'; ?>">
</head>
<body <?php body_class(); ?>>
	<header id="header" class="jumbotron">
		<?php get_template_part('navbar'); ?>
	</header>
