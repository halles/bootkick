<header class="post-header">

	<h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>

	<time class="published" datetime="<?php echo get_post_time('c', true); ?>">
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
			<?php the_time('j/m/Y'); ?> @ <?php the_time('g:i a'); ?>
		</a>
	</time>
	
	<address class="vcard author">
		<?php _e('Por', BootKick::$textDomain); ?> <a class="url fn" href="<?php the_author_meta('user_url'); ?>"><?php the_author(); ?></a>
	</address>
	
	<div class="post-category">
		<?php _e('Publicado en', BootKick::$textDomain); ?> <?php the_category(', '); ?>
	</div>
	
	<div class="post-tag">
		<?php the_tags(__('Tags ', BootKick::$textDomain), ', ', ''); ?>
	</div>

</header>