<?php get_header(); ?>

<section id="single" class="content">
<div class="wrap">

	<?php echo get_template_part('loop'); ?>
	
	<?php echo get_template_part('loop', 'post-comments'); ?>
	
</div>	
</section>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>