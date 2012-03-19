<?php get_header(); ?>

<section id="index" class="content">
<div class="wrap">

	<?php if (have_posts()) : ?>
	
		<?php while (have_posts()) : the_post(); ?>
		
			<?php echo get_template_part('loop', 'post'); ?>
		
		<?php endwhile; ?>
		
		<?php echo get_template_part('loop', 'pagination'); ?>

	<?php else : ?>

		<h2 class="center"><?php _e('Lo siento, no pudimos encontrar lo que buscas', BootKick::$textDomain); ?></h2>

	<?php endif; ?>
		
</div>	
</section>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>