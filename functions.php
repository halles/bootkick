<?php

require( dirname( __FILE__ ) . '/theme-options/theme-options.php' );

class BootKick{
		
	private static $name = 'BootKick';
	private static $version = '0.1.0';
	
	public static $textDomain = 'bootkick';
	public static $excerpt_length = null; 

	function afterSetupTheme(){
	
		self::themeSupport();
		add_action( 'init', self::init());
		add_action( 'widgets_init', array(__CLASS__, 'registerSidebars' ));
		
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
	
	function registerSidebars(){
	
		$sidebars = array(
			'main' => __('Main Sidebar', self::$textDomain),
			'footer-1' => __('Footer 1', self::$textDomain),
			'footer-2' => __('Footer 2', self::$textDomain),
			'footer-3' => __('Footer 3', self::$textDomain),
		);
		
		foreach($sidebars as $id => $name){
			$args = array(
				'name'          => $name,
				'id'            => $id,
				'description'   => '',
				'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget'  => '</li>',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>'
			);
			
			register_sidebar($args);
		}
		
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
		$options = get_option( 'bootkick', array() );
		if($options['less.js']){
			wp_register_style(self::$name.'-less', get_bloginfo('stylesheet_directory').'/css/style.less', false, self::$version, 'screen' );
		}else{
			wp_register_style(self::$name.'-less-compiled', get_bloginfo('stylesheet_directory').'/css/style.css', false, self::$version, 'screen' );
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
			$options = get_option( 'bootkick', array() );
			if($options['less.js']){
				wp_enqueue_style(self::$name.'-less');
			}else{
				wp_enqueue_style(self::$name.'-less-compiled');
			}
				
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
			
			if ( is_singular() && get_option( 'thread_comments' ) )
				wp_enqueue_script( 'comment-reply' );
		
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
	
	/** Comment Template **/
	
	function commentCallback( $comment, $args, $depth ){
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
				if($template = locate_template('comments-template-pingback.php')){
					include($template);
				}
				break;
			case 'trackback' :
				if($template = locate_template('comments-template-trackback.php')){
					include($template);
				}
				break;
			default :
				if($template = locate_template('comments-template.php')){
					include($template);
				}
				break;
		endswitch;
	}


}

add_action('after_setup_theme', array('BootKick', 'afterSetupTheme'));

?>