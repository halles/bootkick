<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>
	
		<?php echo get_template_part('loop', 'post'); ?>
	
	<?php endwhile; ?>
	
	<?php echo get_template_part('loop', 'pagination'); ?>

<?php else : ?>

	<?php echo get_template_part('loop', 'notfound'); ?>

<?php endif; ?>