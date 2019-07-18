<?php
function child_theme_enqueue_styles() {
$parent_style = 'parent-style';

wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ), wp_get_theme()->get('Version') );
}
add_action( 'wp_enqueue_scripts', 'child_theme_enqueue_styles' );

/** Adds a view to the post being viewed*/
if ( ! function_exists('promociones') ) {

// Register Custom Post Type
function promociones() {

	$labels = array(
		'name'                  => _x( 'promociones', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Promocion', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Promociones', 'text_domain' ),
		'name_admin_bar'        => __( 'Promocion', 'text_domain' ),
		'archives'              => __( 'Archivo de Promociones', 'text_domain' ),
		'attributes'            => __( 'Atributos de promocion', 'text_domain' ),
		'parent_item_colon'     => __( 'Promocion padre', 'text_domain' ),
		'all_items'             => __( 'Todas las promociones', 'text_domain' ),
		'add_new_item'          => __( 'Añadir nueva Promocion', 'text_domain' ),
		'add_new'               => __( 'Añadir nuevo', 'text_domain' ),
		'new_item'              => __( 'Nueva Promocion', 'text_domain' ),
		'edit_item'             => __( 'Editar Promocion', 'text_domain' ),
		'update_item'           => __( 'Actualizar Promocion', 'text_domain' ),
		'view_item'             => __( 'Ver Promocion', 'text_domain' ),
		'view_items'            => __( 'Ver Promociones', 'text_domain' ),
		'search_items'          => __( 'Buscar Promocion', 'text_domain' ),
		'not_found'             => __( 'No encontrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'No encontrado en la papelera', 'text_domain' ),
		'featured_image'        => __( 'Imagen destacada', 'text_domain' ),
		'set_featured_image'    => __( 'Configurar imagen destacada', 'text_domain' ),
		'remove_featured_image' => __( 'Borrar imagen destacada', 'text_domain' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'text_domain' ),
		'insert_into_item'      => __( 'Insertar en la promocion', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Actualizar en esta promocion', 'text_domain' ),
		'items_list'            => __( 'Listado de promociones', 'text_domain' ),
		'items_list_navigation' => __( 'Lista navegable de promociones', 'text_domain' ),
		'filter_items_list'     => __( 'Filtro de lista de promociones', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Promocion', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-tickets',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'map_meta_cap'			 => true,
		'capability_type'		 => 'promociones',
	);
	register_post_type( 'Promociones', $args );

}
add_action( 'init', 'promociones', 0 );

}

add_shortcode( 'nota' , 'nota_editores' );

function nota_editores ($atts , $content = null) {
if( is_user_logged_in() ){

$user=wp_get_current_user();
$roles= (array)$user->roles;

if(in_array('editores', $roles)){
	echo "<p>Nota para los editores:" .$content. "</p>";
}
}
}
?>