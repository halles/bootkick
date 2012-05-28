<header class="post-header">

	<h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>

	<div class="post-meta">
		Publicado el <time datetime="<?php echo get_post_time('c', true); ?>">
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
				<?php the_time('j/m/Y'); ?> a las <?php the_time('g:i a'); ?>
			</a>
		</time>
		<address class="vcard author">
			<?php _e('por', BootKick::$textDomain); ?> <a class="url fn" href="<?php the_author_meta('user_url'); ?>"><?php the_author(); ?></a>
		</address>
	</div>

</header>