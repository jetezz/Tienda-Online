<?php
/*
Plugin Name: [Contador]
Plugin URI: [URL del plugin (si la va a tener, si no puedes poner la tuya)]
Description: [Contador de visitas]
Version:[0.1]
Author:[jesus]
License:[GPL]
*/

/** Adds a view to the post being viewed*/
function mycp_add_view() {
if(is_single()) {
global $post;
$current_views = get_post_meta($post->ID, "mycp_views", true);
if(!isset($current_views) OR
empty($current_views) OR
!is_numeric($current_views) ) {
$current_views = 0;
}
$new_views = $current_views + 1;
update_post_meta($post->ID, "mycp_views", $new_views);
return $new_views;
}
}
add_action("wp_head", "mycp_add_view");


/** Retrieve the number of views for a post*/
function mycp_get_view_count() {
global $post;
$current_views = get_post_meta($post->ID, "mycp_views", true);
if(!isset($current_views) OR
empty($current_views) OR
!is_numeric($current_views) ) {
$current_views = 0;
}
return $current_views;
}

/* Shows the number of views for a post */
function mycp_show_views($singular = "visita",
$plural = "visitas",
$before = "Esta promocion tiene: ") {
global $post;
$current_views = mycp_get_view_count();
$views_text = $before . $current_views . " ";
if ($current_views == 1) {
$views_text .= $singular;
}
else {
$views_text .= $plural;
}
echo $views_text;
}

function mycp_show_views2($singular = "visita",
$plural = "visitas",
$before = "Esta entrada tiene: ") {
global $post;
$current_views = mycp_get_view_count();
$views_text = $before . $current_views . " ";
if ($current_views == 1) {
$views_text .= $singular;
}
else {
$views_text .= $plural;
}
echo $views_text;
}


/* Displays a list of posts ordered by post count*/
function mycp_popularity_list($post_count = 10) {
$args = array(
"posts_per_page" => 10,
"post_type" => "promociones",
"post_status" => "publish",
"meta_key" => "mycp_views",
"orderby" => "meta_value_num",
"order" => "DESC"

);
$mycp_list = new WP_Query($args);
if($mycp_list->have_posts()) { echo "<ul>"; }





while ( $mycp_list->have_posts() ) : $mycp_list->the_post();
 
$Fecha=get_field( 'fecha_para_finalizar_la_oferta' );
$Hoy=date("Y-m-d" );



$fecha1 = date_create($Fecha);
$fecha2 = date_create($Hoy);





    	  if ($fecha2 < $fecha1){
    	 
    	


                if ( is_singular() ) :
                   the_title( '<h2 class="post_title">', '</h2>' );
                else :
                    the_title( sprintf( '<h3 class="post_title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
                endif;

                ?>

                <div style="  width: 40%">
   				 <?php get_template_part( "post_image", "content" ); ?>
				</div>

				<p>Precio: <?php the_field( 'precio' ); ?> €</p>
				<p>Fecha de fin de oferta: <?php the_field( 'fecha_para_finalizar_la_oferta' ); ?></p>
				
				<p> Descuento: <?php the_field( 'descuento' ); ?>%</p>
				<?php mycp_show_views() ?>
				

        <?php // get_template_part( "/templates/content", "index" ) 
    }
endwhile;
if($mycp_list->have_posts()) { echo "</ul>";}
}

?>