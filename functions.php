<?php

class BootKick{
		
	private static $name = 'BootKick';
	private static $version = '0.1.0';
	
	public static $textDomain = 'bootkick';
	public static $excerpt_length = null; 

	function afterSetupTheme(){
	
		self::themeSupport();
		add_action( 'init', self::init());
		
		add_action( 'wp_print_styles', array(__CLASS__, 'enqueueStyles'));
		add_filter( 'style_loader_tag', array(__CLASS__, 'enqueueLessStyles'), 5, 2);
		add_action( 'wp_print_scripts', array(__CLASS__, 'enqueueScripts') );
		
	}
	
	function init(){
		
		self::registerAssets();
		self::customSizes();
		self::registerMenus();
		
		add_filter('excerpt_length', array(self::$name,'new_excerpt_length'), 999);
		
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wlwmanifest_link');
		remove_action('wp_head', 'wp_generator');
		
	}
	
	function themeSupport(){

		/** Thumbnail automático para cada Post */
		add_theme_support( 'post-thumbnails' );
		
	}

	/** Custom Types **/

	function customTypes(){
	
	}
	
	function customTaxonomies(){
	
	}
		
	/** Custom Sizes **/
	
	function customSizes(){
		
		// set_post_thumbnail_size( 100, 100, true );
		// add_image_size( 'example' , 200, 100, true );
		
	}
	
	/** Modificación del Excerpt **/
	
	function set_excerpt_length($length){
		self::$excerpt_length = $length;
	}

	function new_excerpt_length() {
		if(self::$excerpt_length !== null)
			return self::$excerpt_length;
		else
			return 55;
	}
	
	
	/** Custom Menus **/
	
	function registerMenus(){
		
		if ( function_exists( 'register_nav_menu' )){
			register_nav_menu( 'main', __('Main Menu', self::$textDomain) );
			register_nav_menu( 'secondary', __('Secondary Menu', self::$textDomain) );
			register_nav_menu( 'footer', __('Footer Menu', self::$textDomain) );
		}
		
	}
	
	/** Assets: Styles && Scripts **/
	
	function registerAssets(){
		
		/** Styles **/
		wp_register_style(self::$name, get_stylesheet_uri(), false, self::$version, 'screen' );
		if(get_bloginfo('template_directory') == get_bloginfo('stylesheet_directory')){
			wp_register_style(self::$name.'-less', get_bloginfo('template_directory').'/css/style.less', false, self::$version, 'screen' );
		}else{
			wp_register_style(self::$name.'-less', get_bloginfo('stylesheet_directory').'/css/style.less', false, self::$version, 'screen' );
		}
		/** Scripts **/
		wp_register_script( 'html5', 'http://html5shim.googlecode.com/svn/trunk/html5.js');
		wp_register_script( 'less.js', get_bloginfo('template_url').'/lib/less.js/dist/less-1.3.0.min.js');
		wp_register_script( 'less.force-recompile.js', get_bloginfo('template_url').'/js/less.force-recompile.js', array('less.js', 'jquery'));
		
	}
	
	/** Styles **/
	function enqueueStyles(){
		if (!is_admin() && !in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ))){
		
			/** Enqueue Styles in Site **/
			
			wp_enqueue_style(self::$name);
			wp_enqueue_style(self::$name.'-less');
				
		}elseif(!is_admin() && in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ))){
		
			/** Enqueue Styles in Login Screen **/
			
		}elseif(is_admin()){
		
			/** Load Styles in Admin **/
		
		}
		
	}

	/** Scripts **/
	function enqueueScripts(){
	
		if (!is_admin() && !in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ))){
		
			/** Enqueue Scripts in Site **/
		
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'html5' );
			wp_enqueue_script( 'less.js' );
			wp_enqueue_script( 'less.force-recompile.js' );
		
		}elseif(!is_admin() && in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ))){
		
			/** Enqueue Scripts in Login Screen **/
			
		}elseif(is_admin()){
		
			/** Load Scripts in Admin **/
		
		}
		
	}
	
	/** Helpers **/
	
	function get_permalink_by_title( $page_title, $output = 'OBJECT' , $post_type = 'page' ){
		if(!$page_title)
			return false;
		
		$page = get_page_by_title( $page_title, $output, $post_type );
		
		if(!$page)
			return false;
		
		return get_page_link($page->ID);
		
	}
	
	function permalink_by_title( $page_title, $output = 'OBJECT' , $post_type = 'page' ){
		echo self::get_permalink_by_title( $page_title, $output, $post_type);
	}
	
	/** Filters **/
	
	function enqueueLessStyles($tag, $handle) {
		global $wp_styles;
		$match_pattern = '/\.less$/U';
		if ( preg_match( $match_pattern, $wp_styles->registered[$handle]->src ) ) {
			$handle = $wp_styles->registered[$handle]->handle;
			$media = $wp_styles->registered[$handle]->args;
			$href = $wp_styles->registered[$handle]->src . '?ver=' . $wp_styles->registered[$handle]->ver;
			$rel = isset($wp_styles->registered[$handle]->extra['alt']) && $wp_styles->registered[$handle]->extra['alt'] ? 'alternate stylesheet' : 'stylesheet';
			$title = isset($wp_styles->registered[$handle]->extra['title']) ? "title='" . esc_attr( $wp_styles->registered[$handle]->extra['title'] ) . "'" : '';
			$tag = "<link rel='stylesheet/less' id='$handle' $title href='$href' type='text/css' media='$media' />";
		}
		return $tag;
	}

}

add_action('after_setup_theme', array('BootKick', 'afterSetupTheme'));

?>