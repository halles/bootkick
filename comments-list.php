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

<h4 class="pinglist-title">Pings & Trackbacks</h4>

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