<ol class="comment-list">
	<?php
	
		$args = array(
			'style'             => 'ol',
			'callback'          => array('BootKick', 'commentCallback'),
			'type'              => 'comment',
		);
	
		wp_list_comments($args);
		
	?>
</ol>

<ol class="pinglist">
	<?php
	
		$args = array(
			'style'             => 'ol',
			'callback'          => array('BootKick', 'commentCallback'),
			'type'              => 'pings',
		);
	
		wp_list_comments($args);
		
	?>
</ol>