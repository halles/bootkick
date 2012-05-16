<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
	<title><?php bloginfo('name'); ?> » <?php echo (is_home()||is_front_page())?get_bloginfo('description'):wp_title('', false); ?></title>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	
<div id="page-wrapper">
	<header id="header">
		<div class="wrap">
			<hgroup>
				<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
				<h2><?php bloginfo('description'); ?></h2>
			</hgroup>
			<nav id="main-nav">
				<?php
					wp_nav_menu(array(
						'theme_location' => 'main',
						'depth'           => 3,
					));
				?>
			</nav>
		</div>
	</header>
	
	<div id="content-wrapper">
		<div id="content-subwrapper">