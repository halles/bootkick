<aside id="sidebar">
	<?php if(!dynamic_sidebar()): ?>
		
		<div id="search" class="widget-container widget_search">
			<?php get_search_form(); ?>
		</div>

		<div id="archives" class="widget-container">
			<h3 class="widget-title"><?php _e( 'Archives' ); ?></h3>
			<ul>
				<?php wp_get_archives( 'type=monthly' ); ?>
			</ul>
		</div>

		<div id="meta" class="widget-container">
			<h3 class="widget-title"><?php _e( 'Meta' ); ?></h3>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
		</div>
		
		
	<?php endif; ?>
</aside>