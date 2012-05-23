<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
<article id="comment-<?php comment_ID(); ?>" class="comment">
	
	<footer class="comment-meta">
		<div class="comment-author vcard">
			<?php
				$avatar_size = 60;
				if ( '0' != $comment->comment_parent )
					$avatar_size = 30;

				echo get_avatar( $comment, $avatar_size );

				/* translators: 1: comment author, 2: date and time */
				printf( __( '%1$s on %2$s <span class="says">said:</span>', 'twentyeleven' ),
					sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
					sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'twentyeleven' ), get_comment_date(), get_comment_time() )
					)
				);
			?>

			<?php edit_comment_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .comment-author .vcard -->

		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyeleven' ); ?></em>
			<br />
		<?php endif; ?>
	</footer>

	<div class="comment-content">
		<?php comment_text(); ?>
	</div>

	<div class="reply">
		<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'twentyeleven' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	</div>
	
</article>