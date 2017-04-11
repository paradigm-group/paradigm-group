<?php get_header(); ?>

    <div class="content">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

            <header class="article-header">

                <div class="container">

                    <h1 class="entry-title single-title" itemprop="headline">
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                    </h1>

                </div>

            </header> <?php // end article header ?>

            <div class="container">

                <div class="main" role="main">

                    <div class="entry-content" itemprop="articleBody">
                        <?php
                        // the content (pretty self explanatory huh)
                        the_content();
                        ?>
                    </div> <?php // end article section ?>

                    <?php get_template_part ('partials/article-footer');?>

                <?php endwhile; ?>

                <?php else : ?>

                    <?php get_template_part ('partials/no-post-found');?>

                <?php endif; ?>

                </div>

                <?php if (in_category('breaking-news')) {

                    get_sidebar('members');

                } else {

                    get_sidebar();

                } ?>

            </div>

        </article>

    </div>

<?php get_footer(); ?>
