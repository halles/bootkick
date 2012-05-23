<ol class="commentlist">
	<?php wp_list_comments(array('callback' => array('BootKick', 'commentCallback'))); ?>
</ol>