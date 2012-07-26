<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php echo get_template_part('loop', 'post-breadcrumb'); ?>		
	
	<?php echo get_template_part('loop', 'post-header'); ?>
	
	<?php echo get_template_part('loop', 'post-content'); ?>
	
	<?php echo get_template_part('loop', 'post-footer'); ?>
	
	<?php echo get_template_part('loop', 'post-comments'); ?>
	
</article>