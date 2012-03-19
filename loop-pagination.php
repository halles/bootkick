<?php if (  $wp_query->max_num_pages > 1 ) : ?>

	<?php if(function_exists('wp_paginate')): ?>
		<?php wp_paginate(); ?>
	<?php else: ?>
		<div class="pagination">
			<div class="pag-previous">
				<?php next_posts_link( __( '‹‹ Artículos Anteriores', BootKick::$textDomain ) ); ?>
			</div>
			<div class="pag-next">
				<?php previous_posts_link( __( 'Artículos Nuevos ››', BootKick::$textDomain ) ); ?>
			</div>
		</div>		
	<?php endif; ?>

<?php endif; ?>