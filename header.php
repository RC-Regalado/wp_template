<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php wp_title('|', true, 'right');?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header id="header" class="jumbotron">
		<?php get_template_part('navbar'); ?>
	</header>
