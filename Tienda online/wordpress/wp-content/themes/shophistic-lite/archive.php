<?php get_header(); ?>

<?php get_template_part( "/templates/beforeloop", "archive" ) ?> 


<?php if (have_posts()) : ?>

   <?php mycp_popularity_list() ?>

    

<?php else : ?>

        <?php get_template_part( "/templates/content", "none" ); ?>

<?php endif; ?>


<?php get_template_part( "/templates/afterloop", "archive" ) ?> 

<?php get_footer(); ?>
