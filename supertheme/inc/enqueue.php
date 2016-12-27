<?php 
	
/**
 * Enqueue scripts and styles.
*/


function supertheme_scripts() {
	wp_enqueue_style( 'mystyle', get_template_directory_uri() . '/style.css' ); 
	wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/custom.css' ); 
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/script/bootstrap/bootstrap.min.css' ); 
	wp_enqueue_style( 'magnific', get_template_directory_uri() . '/script/magnific/magnific-popup.css' );
	wp_enqueue_style( 'owl_carousel', get_template_directory_uri() . '/script/owl/owl.carousel.css' ); 
	wp_enqueue_style( 'owl_carousel_transitions', get_template_directory_uri() . '/script/owl/owl.transitions.css' );  
	wp_enqueue_style( 'font', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );  
	
	
	
	
	
	if (!is_admin())
	{
		wp_deregister_script('jquery');
		wp_register_script('jquery', includes_url('js/jquery/jquery.js'), array(), false, true);
		wp_enqueue_script('jquery');
		
		/* Bootstrap */
	    wp_enqueue_script('boot_js', get_template_directory_uri() . '/script/bootstrap/bootstrap.min.js', array('jquery'), 'false', true );
		wp_enqueue_script('boot_js');
		
		/* OWL */
		wp_enqueue_script('owl_js', get_template_directory_uri() . '/script/owl/owl.carousel.js', array('jquery'), 'false', true );
		wp_enqueue_script('owl_js');
		
		/* Magnific Popup*/
		wp_enqueue_script('magnific_js', get_template_directory_uri() . '/script/magnific/jquery.magnific-popup.min.js', array('jquery'), 'false', true );
		wp_enqueue_script('magnific_js');
		
		
		/* Custom pb_js*/
		
		wp_enqueue_script('custom_js', get_template_directory_uri() . '/script/custom.js', array('jquery'), 'false', true );
		wp_enqueue_script('magnific_js');
		
		
	
   
if ( is_page( 'progetti' )) {  
	
		/* Portfolio_js*/
		wp_enqueue_style( 'portfolio', get_template_directory_uri() . '/script/filterable/portfolio.css' );
		wp_register_script('isotope_js', get_template_directory_uri() . '/script/filterable/jquery.isotope.min.js', array('jquery'), 'false', true );
		wp_enqueue_script('isotope_js');
		wp_register_script('isotope_js_pkgd', get_template_directory_uri() . '/script/filterable/isotope.pkgd.min.js', array('jquery'), 'false', true );
		wp_enqueue_script('isotope_js_pkgd');
		wp_register_script('packery-mode', get_template_directory_uri() . '/script/filterable/packery-mode.pkgd.min.js', array('jquery'), 'false', true );
		wp_enqueue_script('packery-mode');
		wp_register_script('filterable', get_template_directory_uri() . '/script/filterable/filterable.js', array('jquery'), 'false', true );
		wp_enqueue_script('filterable');

} else { 
    
}   



	/* Theme_js*/
		
		wp_enqueue_script('navigation_js', get_template_directory_uri() . '/js/navigation.js', array('jquery'), 'false', true );
		wp_enqueue_script('navigation_js');
		wp_enqueue_script('skip_js', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery'), 'false', true );
		wp_enqueue_script('skip_js');
		
		
	}
	
}
add_action( 'wp_enqueue_scripts', 'supertheme_scripts' );


