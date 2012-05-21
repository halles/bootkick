<?php

	$args = array(
		'before'           => '<div class="post-pagination">' . __('Páginas: '),
		'after'            => '</div>',
	);

	wp_link_pages($args);
	
?>