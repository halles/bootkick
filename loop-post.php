<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
	<header>
		<h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
	</header>

	<div class="post-content">
		<?php the_content(__('Continuar leyendo este artículo ››', BootKick::$textDomain)); ?>
	</div>
	
	<footer class="post-info">
		<abbr class="published" title=""><?php the_time('j/m/Y'); ?> @ <?php the_time('g:i a'); ?></abbr>
		<address class="vcard author">
			<?php _e('Por', BootKick::$textDomain); ?> <a class="url fn" href="<?php the_author_meta('user_url'); ?>"><?php the_author(); ?></a>
		</address>
		<div class="post-category">
			<?php _e('Publicado en', BootKick::$textDomain); ?> <?php the_category(', '); ?>
		</div>
		<div class="post-tag">
			<?php the_tags(__('Tags', BootKick::$textDomain), ', ', ''); ?>
		</div>

		<div class="post-comments">
			<?php comments_popup_link(__('Sin Comentarios ›', BootKick::$textDomain), __('1 Comentario ›', BootKick::$textDomain), __('% Comentarios ›', BootKick::$textDomain)); ?>
		</div>					
		
		<div class="post-meta">
			<?php if ( $user_ID ) : ?><span><?php edit_post_link(); ?></span><?php endif; ?>
		</div>
	</footer>
	
</article>