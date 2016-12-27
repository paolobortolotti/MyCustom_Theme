<?php
/**
 * Setting del tema
 */



/* Size Immagini Personalizzate */


//Default WordPress
the_post_thumbnail( 'thumbnail' );     // Thumbnail (150 x 150 hard cropped)
the_post_thumbnail( 'medium' );        // Medium resolution (300 x 300 max height 300px)
the_post_thumbnail( 'medium_large' );  // Medium Large (added in WP 4.4) resolution (768 x 0 infinite height)
the_post_thumbnail( 'large' );         // Large resolution (1024 x 1024 max height 1024px)
the_post_thumbnail( 'full' );          // Full resolution (original size uploaded)

if ( function_exists( 'add_image_size' ) ) { 
    add_image_size( 'category-thumb', 300 ); // 300 pixels wide (and unlimited height)
    add_image_size( 'homepage-thumb', 220, 180, true ); // larghezza 220 pixel per altezza 180 pixel, modalità di ritaglio proporzionale
    add_image_size( 'progetti', 300, 250, true ); // (Personalizzata per Progetti)
}


////////////////////////////////////////////////////////////////////
// Aggiungo script nel footer
////////////////////////////////////////////////////////////////////

/*
function my_wow_init() {
 
    echo "<script type=\"text/javascript\">
        var wow = new WOW(
            {
                animateClass: 'animated',
                offset:       50, 
                live:         true  
            }
        );
        wow.init();
   
        </script>";
 
}
*/


////////////////////////////////////////////////////////////////////
// Immagine Evidenza Colonne
////////////////////////////////////////////////////////////////////

if (function_exists( 'add_theme_support' )){
    add_filter('manage_posts_columns', 'posts_columns', 5);
    add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
    add_filter('manage_pages_columns', 'posts_columns', 5);
    add_action('manage_pages_custom_column', 'posts_custom_columns', 5, 2);
}
function posts_columns($defaults){
    $defaults['wps_post_thumbs'] = __('Immagine in Evidenza');
    return $defaults;
}
function posts_custom_columns($column_name, $id){
        if($column_name === 'wps_post_thumbs'){
        echo the_post_thumbnail( array(125,80) );
    }
}


////////////////////////////////////////////////////////////////////
// Template usato in Colonne
////////////////////////////////////////////////////////////////////

add_filter( 'manage_pages_columns', 'page_column_views' );
add_action( 'manage_pages_custom_column', 'page_custom_column_views', 4, 3 );
function page_column_views( $defaults )
{
   $defaults['page-layout'] = __('Template di Pagina');
   return $defaults;
}
function page_custom_column_views( $column_name, $id )
{
   if ( $column_name === 'page-layout' ) {
       $set_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
       if ( $set_template == 'default' ) {
           echo 'Default';
       }
       $templates = get_page_templates();
       ksort( $templates );
       foreach ( array_keys( $templates ) as $template ) :
           if ( $set_template == $templates[$template] ) echo $template;
       endforeach;
   }
}




////////////////////////////////////////////////////////////////////
// Aggiungere snippet:  http://wp-snippets.com/
////////////////////////////////////////////////////////////////////




////////////////////////////////////////////////////////////////////
// Rimuovere Archive da Titolo:  
////////////////////////////////////////////////////////////////////


add_filter( 'get_the_archive_title', function ($title) {
    if ( is_archive() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {
 $title = '<span class="vcard">' . get_the_author() . '</span>' ;
}
return $title;

});