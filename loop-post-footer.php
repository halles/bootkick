<footer class="post-footer">

	<div class="post-comments">
		<?php comments_popup_link(__('Sin Comentarios ›', BootKick::$textDomain), __('1 Comentario ›', BootKick::$textDomain), __('% Comentarios ›', BootKick::$textDomain)); ?>
	</div>					
	
	<div class="post-meta">
		<?php if ( $user_ID ) : ?><span><?php edit_post_link(); ?></span><?php endif; ?>
	</div>

</footer>