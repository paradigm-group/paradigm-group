<?php
/*
 Template Name: Members Template
 *
 * This is the Members Area template.
 * It differs from the public facing pages, because it actually has useful information on it. Apparently.
 * It should also be completely locked off.
*/
?>

<?php get_header(); ?>
    <div class="content">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

            <header class="article-header page-header">

                <div class="container">

                    <h1 class="entry-title page-title" itemprop="headline">
                        <?php the_title(); ?>
                    </h1>

                </div>

            </header> <?php // end article header ?>

            <div class="container">

                <div class="main entry-content" itemprop="articleBody">

                    <?php if (is_front_page()) {} else {
                        if ( function_exists('yoast_breadcrumb') ) {
                            yoast_breadcrumb('<p id="breadcrumbs">','</p>');
                        }
                    } ?>

                    <?php
                        // the content (pretty self explanatory huh)
                        the_content();
                    ?>

                    <?php

                    // check for rows (parent repeater)
                    if( have_rows('tile') ): ?>
                        <div class="tile-container">
                            <?php
                            // loop through rows (parent repeater)
                            while( have_rows('tile') ): the_row(); ?>
                                <div class="tile">
                                    <h2 class="tile-title"><?php the_sub_field('title_link'); ?></h2>
                                    <?php

                                    // check for rows (sub repeater)
                                    if( have_rows('menu') ): ?>
                                        <ul>
                                        <?php

                                        // loop through rows (sub repeater)
                                        while( have_rows('menu') ): the_row();

                                            // display each item as a list - with a class of completed ( if completed )
                                            ?>
                                            <li>
                                                <a href="<?php the_sub_field('menu_item'); ?>">
                                                    <?php the_sub_field('menu_item'); ?>
                                                </a>
                                            </li>
                                        <?php endwhile; ?>
                                        </ul>
                                    <?php endif; //if( get_sub_field('items') ): ?>
                                </div>

                            <?php endwhile; // while( has_sub_field('to-do_lists') ): ?>
                        </div>
                    <?php endif; // if( get_field('to-do_lists') ): ?>

                    <?php if (is_page ('members-area')) { echo adrotate_group(2); } ?>

                </div> <?php // end article section ?>

                <?php get_sidebar('members'); ?>

            </div>
        </article>

    <?php endwhile; else : ?>

        <?php get_template_part ('partials/no-post-found');?>

    <?php endif; ?>

    </div>

<?php get_footer(); ?>
