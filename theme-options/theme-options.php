<?php

require_once( dirname( __FILE__ ) . '/../lib/theme-options/options/options.php' );

function setup_framework_options(){
$args = array();

//Add HTML before the form
$args['intro_text'] = __('<p>This is the HTML which can be displayed before the form, it isnt required, but more info is always better. Anything goes in terms of markup here, any HTML.</p>', 'nhp-opts');

$args['opt_name'] = 'bootkick';
$args['menu_title'] = __('BootKick Options', 'bootkick-opts');
$args['page_title'] = __('BootKick Theme Options', 'bootkick-opts');
$args['page_slug'] = 'bootkick_options';

$sections = array();
				
$tabs = array();

global $NHP_Options;
$NHP_Options = new NHP_Options($sections, $args, $tabs);

}

add_action('init', 'setup_framework_options', 0);

?>