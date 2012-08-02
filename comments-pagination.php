<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

<div class="comments-navigation">
	<div class="prev">
		<?php previous_comments_link( __( '<span>«</span> Comentarios Anteriores', 'bootkick' ) ); ?>
	</div>
	<div class="next">
		<?php next_comments_link( __( 'Comentarios Nuevos <span>»</span>', 'bootkick' ) ); ?>
	</div>
</div>

<?php endif; ?>