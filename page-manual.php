<?php
/*
 Template Name: Manual Template
 *
 * This is the Compliance Manual template.
 * It should show the current chapter's contents in the sidebar.
 *
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

                </div> <?php // end article section ?>

                <?php get_sidebar('manual'); ?>

            </div>
        </article>

    <?php endwhile; else : ?>

        <?php get_template_part ('partials/no-post-found');?>

    <?php endif; ?>

    </div>

<?php get_footer(); ?>
