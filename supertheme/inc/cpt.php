<?php
/**
 * Custom Post Type
*/
///////// Recuperare icone per i cpt
//https://developer.wordpress.org/resource/dashicons/#image-filter
////////

add_action( 'init', 'progetto_custom_init' );
function progetto_custom_init()
{
  $labels = array(
    'name' => _x('Progetti', 'post type general name'),
    'singular_name' => _x('Progetti', 'post type singular name'),
    'add_new' => _x('Aggiungi Nuovo', 'progetto'),
    'add_new_item' => __('Aggiungi un nuovo Lavoro'),
    'edit_item' => __('Modifica progetto'),
    'new_item' => __('Nuovo Progetto'),
    'view_item' => __('Guarda il Progetto'),
    'search_items' => __('Cerca tra i progetti'),
    'not_found' =>  __('Nessun Progetto Trovato'),
    'not_found_in_trash' => __('Nessun progetto nel cestino'),
    'parent_item_colon' => '',
    'menu_name' => 'Progetti',
 
  );
	$args = array(
		'labels'        => $labels,
		'description'   => 'Inserisci un nuovo prodotto',
		'public'        => true,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments',  ),
		'has_archive'   => false,
		'hierarchical'	=> true,
		'rewrite'		=> array('slug' => 'progetti/%brand%','with_front' => false),
		'query_var'		=> true,
		'menu_icon'     => 'dashicons-image-filter', 

	);
	register_post_type( 'progetto', $args );
}

function my_taxonomies_product() {
	$labels = array(
		'name'              => _x( 'Categoria Progetto', 'taxonomy general name' ),
		'singular_name'     => _x( 'Categora', 'taxonomy singular name' ),
		'search_items'      => __( 'Cerca tutte le Categorie' ),
		'all_items'         => __( 'Tutte le Categorie di prodotti ' ),
		'edit_item'         => __( 'Modifica Categoria di prodotto' ),
		'update_item'       => __( 'Aggiorna prodotto di Categoria' ),
		'add_new_item'      => __( 'Aggiungi Nuova Categoria di prodotto ' ),
		'new_item_name'     => __( 'Nuovo Categoria di prodotto ' ),
		'menu_name'         => __( 'Categoria' ),
		
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' 	=> true,
		'public'		=> true,
		'query_var'		=> 'brand',
		'show_admin_column' => true,
		'rewrite'		=>  array('slug' => 'progetti' ),
		'_builtin'		=> false,
	);
	register_taxonomy( 'brand', 'progetto', $args );
	
	}
	
add_action( 'init', 'my_taxonomies_product', 0 );


/*Filtro per modificare il permalink*/
add_filter('post_link', 'brand_permalink', 1, 3);
add_filter('post_type_link', 'brand_permalink', 1, 3);

function brand_permalink($permalink, $post_id, $leavename) {
	//con %brand% catturo il rewrite del Custom Post Type
    if (strpos($permalink, '%brand%') === FALSE) return $permalink;
        // Get post
        $post = get_post($post_id);
        if (!$post) return $permalink;

        // Get taxonomy terms
        $terms = wp_get_object_terms($post->ID, 'brand');
        if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
        	$taxonomy_slug = $terms[0]->slug;
        else $taxonomy_slug = 'senza-categoria';

    return str_replace('%brand%', $taxonomy_slug, $permalink);
}


///////////
//Style Voce Menu
//////////
add_action('admin_head', 'my_custom_fonts');
function my_custom_fonts() {
  echo '
  <style>
  #menu-posts-progetti { background-color: #D54E21;}  
  </style>';
}

/////////////////////
///// Colonne per cpt
////////////////////

add_filter( 'manage_taxonomies_for_activity_columns', 'activity_type_columns' );
function activity_type_columns( $taxonomies ) {
    $taxonomies[] = 'brand';
    return $taxonomies;
}


//////////////////////////////////////////////////////////////  Sostituisce ARTICOLI con RICETTE

/*
function edit_admin_menus() {
global $menu;
$menu[5][0] = 'Materiale Divulgativo'; 
}
add_action( 'admin_menu', 'edit_admin_menus' );
*/



//////////////////////////////////////////////////////////////
////// Opzione di portfolio uno
//////////////////////////////////////////////////////////////
	
/*	
	
function my_taxonomies_product_other() {
	$labels = array(
		'name'              => _x( 'Altro', 'taxonomy general name' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Product Categories' ),
		'all_items'         => __( 'All Product Categories' ),
		'parent_item'       => __( 'Parent Product Category' ),
		'parent_item_colon' => __( 'Parent Product Category:' ),
		'edit_item'         => __( 'Edit Product Category' ),
		'update_item'       => __( 'Update Product Category' ),
		'add_new_item'      => __( 'Add New Product Category' ),
		'new_item_name'     => __( 'New Product Category' ),
		'menu_name'         => __( 'Altro' ),
		
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' 	=> true,
		'public'		=> false,
		"show_ui" 		=> true,
		'show_admin_column' => true,
		'query_var'		=> 'other',
		//slug prodotto deve coincidere con il primo parametro dello slug del Custom Post Type correlato
		'rewrite'		=>  false,
		'_builtin'		=> false,
	);
	register_taxonomy( 'other', 'portfolio', $args );

}
add_action( 'init', 'my_taxonomies_product_other', 0 );

*/



//////////////////////////////////////////////////////////////
////// Opzione di portfolio due
//////////////////////////////////////////////////////////////


/*
add_action( 'init', 'tag_taxonomies' ); 
function tag_taxonomies() 
{

  $labels = array(
    'name' => _x( 'Opzioni', 'taxonomy general name' ),
    'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Tags' ),
    'popular_items' => __( 'Popular Tags' ),
    'all_items' => __( 'All Tags' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Tag' ), 
    'update_item' => __( 'Update Tag' ),
    'add_new_item' => __( 'Add New Tag' ),
    'new_item_name' => __( 'New Tag Name' ),
    'separate_items_with_commas' => __( 'Separate tags with commas' ),
    'add_or_remove_items' => __( 'Add or remove tags' ),
    'choose_from_most_used' => __( 'Choose from the most used tags' ),
    'menu_name' => __( 'Opzioni' ),
  ); 

  register_taxonomy('tag','portfolio',array( 
    'hierarchical' => false,
    'labels' => $labels,
    'show_admin_column' => true,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'tag' ),
  ));
}

*/


/*-- Custom Post Init Ends 

add_action( 'init', 'cptui_register_my_cpts_clients' );
function cptui_register_my_cpts_clients() {
	$labels = array(
		"name" => __( 'Clienti', '' ),
		"singular_name" => __( 'Cliente', '' ),
		);

	$args = array(
		"label" => __( 'Clienti', '' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => true,
		"query_var" => true,
				
		"supports" => array( 'thumbnail','title' ),				
	);
	register_post_type( "clients", $args );

// End of cptui_register_my_cpts_clients()
}

