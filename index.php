<?php get_header(); ?>
<main id="main" class="container">
	<div id="ttr_main">
		<div id="ttr_content">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<p><?php the_content(__('(more...)')); ?></p>
				<?php endwhile;
				else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>
		</div>
	</div>
</main>
<?php get_footer(); ?>


