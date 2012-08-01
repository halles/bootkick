<?php

require_once( dirname( __FILE__ ) . '/../lib/theme-options/options/options.php' );

function bootkickThemeOptions(){

	$args = array();

	//Add HTML before the form
	$args['intro_text'] = __('<p>Algunas opciones configurables del theme</p>', BootKick::$textDomain);

	$args['opt_name'] = 'bootkick';
	$args['menu_title'] = __('BootKick Options', BootKick::$textDomain);
	$args['page_title'] = __('BootKick Theme Options', BootKick::$textDomain);
	$args['page_slug'] = 'bootkick_options';
	$args['page_position'] = null;

	$sections = array();

	$sections[] = array(
		'title' => __('Less', BootKick::$textDomain),
		'desc' => __('<p class="description">Configura las utilización de Less.js u otro como compilador de los estilos</p>', BootKick::$textDomain),
		//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
		//You dont have to though, leave it blank for default.
		'icon' => null,
		//Lets leave this as a blank section, no options just some intro text set above.
		'fields' => array(
			array(
				'id' => 'less.js',
				'type' => 'checkbox',
				'title' => __('Less.js', BootKick::$textDomain),
				'sub_desc' => __('Utiliza el compilador de Less original. Esto permite realizar cambios en los estilos y ver las modificaciones en vivo. No se recomienda utilizarlo con el sitio en producción.', BootKick::$textDomain),
				'desc' => __('Utilizar less.js para compilar estilos', BootKick::$textDomain),
				'std' => '1',
			),
			array(
				'id' => 'less-php-compile',
				'type' => 'checkbox',
				'title' => __('Compilar CSS', BootKick::$textDomain), 
				'sub_desc' => __('Compila el CSS desde LESS utilizando phpless', BootKick::$textDomain),
				'desc' => __('Compilar CSS'),
				'validate_callback' => 'compile_css',
			)
		)
	);
					
	$tabs = array();

	global $NHP_Options;
	$NHP_Options = new NHP_Options($sections, $args, $tabs);

}


add_action('init', 'bootkickThemeOptions', 0);

function validate_callback_function($field, $value, $existing_value){
	
	$error = true;

	if($value == 1){
		/* Do compile **/
		$field['msg'] = $value.' El CSS ha sido compilado '.$existing_value;
	}
	
	$field['msg'] = $value.' El CSS ha sido compilado '.$existing_value;
	
	$return['value'] = 0;
	$return['error'] = $field;
	return $return;
	
}

?>