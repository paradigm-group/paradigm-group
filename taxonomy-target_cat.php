<?php get_header(); ?>

    <div class="content">

        <?php

            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            $parent = get_term($term->parent, get_query_var('taxonomy') );

            if($term->parent > 0)  {
        ?>

            <?php get_template_part ('partials/target-child');?>

        <?php } else { ?>

           <?php get_template_part ('partials/target-parent');?>

        <?php } ?>

    </div> <!-- end #content -->

<?php get_footer (); ?>
