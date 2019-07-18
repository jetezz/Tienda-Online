<?php /**
 * Template Name: plantilla-Promociones
  */ 
?>

<?php get_header(); ?>


<?php



 get_template_part( "/templates/beforeloop", "archive" );


 $args = array( 'post_type' => 'promociones', 'posts_per_page' => 10 );
 $loop = new WP_Query( $args );
  ?> 


<?php if ( $loop->have_posts()) : ?>


    <?php while ( $loop->have_posts()) : $loop->the_post(); ?>


    	
        <?php get_template_part( "/templates/content", "index" ); ?>
		



    <?php endwhile; ?>
 

<?php else : ?>

        <?php get_template_part( "/templates/content", "none" ); ?>

<?php endif; ?>


<?php  get_template_part( "/templates/afterloop", "archive" ) ?> 

<?php get_footer(); ?>