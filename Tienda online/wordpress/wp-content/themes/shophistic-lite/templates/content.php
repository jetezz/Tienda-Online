<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    
    <?php 
    if ( is_single() ) :
        the_title( '<h1 class="post_title">', '</h1>' );
    else :
        the_title( sprintf( '<h2 class="post_title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
    endif;
    ?>
    
    <?php
     get_template_part( "post_image", "content" ); ?>
    
  

    <div class="entry">
        <?php the_content(); //Read more button is in framework/functions/single_functions.php?>
        <div class="clearfix"></div>
    </div>
    <?php if (get_field( 'precio' )){
     echo " <p>Precio: ";the_field( 'precio' ); echo "  €</p>";
     echo "<p>Fecha de fin de oferta:";  the_field( 'fecha_para_finalizar_la_oferta' );  echo" </p>";         
     echo "<p> Descuento:";  the_field( 'descuento' ); echo "%</p>";
 }
      ?>
    <?php
    wp_link_pages( array(
        'before'      => '<div class="page-links">',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => esc_attr__( 'Page', 'shophistic-lite' ) . ' %',
        'separator'   => '',
    ) );
    ?>

    <?php get_template_part( "meta", "content" ); ?>

    <div class="clearfix"></div>
</article>