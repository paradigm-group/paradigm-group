<?php
/*
 * Template Name: Providers Template
 *
 * This is the Provider page template.
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

            <?php get_sidebar('members'); ?>

            <div class="main entry-content" itemprop="articleBody">
                <?php
                    if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb('<p id="breadcrumbs">','</p>');
                } ?>
                <?php the_field ('intro_text');?>

                <?php if( have_rows('main_content') ): ?>

                        <?php while( have_rows('main_content') ): the_row();?>

                            <h2><a class="aj-collapse" rel="<?php the_sub_field ('section_id') ;?>"><?php  the_sub_field ('section_title') ; ?></a></h2>

                            <div class="aj-hidden clearfix" id="<?php  the_sub_field ('section_id') ;?>">
                                <?php  the_sub_field ('section_content') ; ?>
                            </div>

                    <?php endwhile; ?>

                <?php endif; ?>

                <?php the_field ('afterthoughts');?>

            </div> <?php // end article section ?>

        </div>

    </article>

<?php endwhile; else : ?>

    <?php get_template_part ('partials/no-post-found');?>

<?php endif; ?>

</div>

<?php get_footer(); ?>
