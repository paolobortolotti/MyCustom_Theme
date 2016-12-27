<?php
/**
 * supertheme Theme Customizer
 *
 * @package supertheme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function supertheme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'supertheme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function supertheme_customize_preview_js() {
	wp_enqueue_script( 'supertheme_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'supertheme_customize_preview_js' );


function themeslug_theme_customizer( $wp_customize ) {
    // Fun code will go here




// Inserire Logo
$wp_customize->add_setting( 'themeslug_logo' );
$wp_customize->add_section( 'themeslug_logo_section' , array(
    'title'       => __( 'Logo', 'themeslug' ),
    'priority'    => 30,
    'description' => 'Upload a logo to replace the default site name and description in the header',
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
    'label'    => __( 'Logo', 'themeslug' ),
    'section'  => 'themeslug_logo_section',
    'settings' => 'themeslug_logo',
) ) );
}
add_action( 'customize_register', 'themeslug_theme_customizer' );





// Inserire Logo admin

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logopb.png);
            padding-bottom: 50px;
            width: 150px!important;
            background-size: 150px!important;
        }
        body, html {
    background: #1D1D1B none repeat scroll 0 0!important;
}
        .wp-core-ui .button, .wp-core-ui .button-primary, .wp-core-ui .button-secondary{border-radius: 0px!important;border: none!important;}
        
        .wp-core-ui .button-primary {
    background: #000 none repeat scroll 0 0!important;
    border: none!important;
    box-shadow: none!important;
    color: #fff;
    text-decoration: none;
    text-shadow:none!important;
}
        
        
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

