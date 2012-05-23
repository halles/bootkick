<section id="comments">

<?php if ( post_password_required() ) : ?>
	
	<?php echo get_template_part('comments', 'no-password.php'); ?>
	
<?php	else: ?>

	<?php if ( have_comments() ) : ?>
		
		<?php echo get_template_part('comments', 'title'); ?>
	
		<?php echo get_template_part('comments', 'pagination'); ?>
	
		<?php echo get_template_part('comments', 'list'); ?>
	
		<?php echo get_template_part('comments', 'pagination'); ?>
	
	<?php endif; ?>
	
	<?php if ( !comments_open() ): ?>
	
		<?php echo get_template_part('comments', 'closed'); ?>
		
	<?php else: ?>
	
		<?php echo get_template_part('comments', 'form'); ?>
		
	<?php endif; ?>

<?php endif; ?>

</section>