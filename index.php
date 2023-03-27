<?php get_header(); ?>
<main id="main" class="container">
	<div id="ttr_main" class="row">
		<div id="ttr_content" class="col">
			<div class="row">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="col">
					<p><?php the_content(__('(more...)')); ?></p>
				</div>
				<?php endwhile;
				else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
