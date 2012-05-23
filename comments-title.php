<h3 id="comments-title">
	<?php printf( _n( 'Una respuesta en %2$s', '%1$s respuestas en %2$s', get_comments_number(), BootKick::$textDomain ), 			number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' ); ?>
</h3>