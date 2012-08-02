<?php if (  $wp_query->max_num_pages > 1 ) : ?>

	<?php if(function_exists('wp_paginate')): ?>
		<?php wp_paginate(); ?>
	<?php else: ?>
		<div class="pagination">
			<div class="prev">
				<?php next_posts_link( __( '‹‹ Artículos Anteriores', 'bootkick' ) ); ?>
			</div>
			<div class="next">
				<?php previous_posts_link( __( 'Artículos Nuevos ››', 'bootkick' ) ); ?>
			</div>
		</div>		
	<?php endif; ?>

<?php endif; ?>