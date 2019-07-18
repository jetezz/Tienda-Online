<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

<div style="  width: 40%">
    <?php get_template_part( "post_image", "content" ); ?>
</div>


    <div class="post_content row">
        <div class="col-md-6">
                <?php 
                if ( is_singular() ) :
                   the_title( '<h2 class="post_title">', '</h2>' );
                else :
                    the_title( sprintf( '<h3 class="post_title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
                endif;
                ?>

            <?php get_template_part( "meta", "content" ); ?>

        

    <div class="clearfix"></div>
</article>