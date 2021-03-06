<?php
/*
 Template Name: Home Template
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
                        Welcome to Paradigm
                    </h1>

                </div>

            </header> <?php // end article header ?>

            <div class="container">

                <div class="main entry-content" itemprop="articleBody">
                    <?php
                        // the content (pretty self explanatory huh)
                        the_content();
                    ?>
                </div> <?php // end article section ?>

                <footer class="article-footer">

                </footer> <?php // end article footer ?>

                <?php get_sidebar(); ?>
            </div>
        </article>

    <?php endwhile; else : ?>

        <?php get_template_part ('partials/no-post-found');?>

    <?php endif; ?>

    </div>

<?php get_footer(); ?>
