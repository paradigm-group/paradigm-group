<?php
/*
 Template Name: Target Template
 *
 * This is the Target archive page template
 * There is mad stuff happening on it.
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

                    <?php if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb('<p id="breadcrumbs">','</p>');
                    } ?>

                    <?php
                        // the content (pretty self explanatory huh)
                        the_content();
                    ?>

                    <?php
                        /*
                        * Loop through Categories and Display Posts within
                        */
                            $args = array(
                                'orderby'       => 'name',
                                'order'         => 'DESC',
                                'hide_empty'    => true,
                                'exclude'       => array(),
                                'exclude_tree'  => array(),
                                'include'       => array(),
                                'number'        => '',
                                'fields'        => 'all',
                                'slug'          => '',
                                'parent'         => '0',
                                'hierarchical'  => true,
                                'child_of'      => 0,
                                'get'           => '',
                                'name__like'    => '',
                                'pad_counts'    => false,
                                'offset'        => '',
                                'search'        => '',
                                'cache_domain'  => 'core'
                            );

                            // Gets every "category" (term) in this taxonomy to get the respective posts
                            $terms = get_terms( 'target_cat', $args );

                            foreach( $terms as $term ) : ?>

                                <h2><a href="http://paradigmgroup.eu/issue/<?php echo $term->slug ?>"><?php echo $term->name ?></a></h2>
                                <?php
                                    //list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)
                                    $taxonomy     = 'target_cat';
                                    $orderby      = 'slug';
                                    $show_count   = 0;      // 1 for yes, 0 for no
                                    $pad_counts   = 0;      // 1 for yes, 0 for no
                                    $hierarchical = 1;      // 1 for yes, 0 for no
                                    $title        = '';
                                    $child= $term->term_id;

                                    $args = array(
                                        'taxonomy'     => $taxonomy,
                                        'orderby'      => $orderby,
                                        'order'              => 'DESC',
                                        'show_count'   => $show_count,
                                        'pad_counts'   => $pad_counts,
                                        'hierarchical' => $hierarchical,
                                        'title_li'     => $title,
                                        'hide_empty'         => true,
                                        'child_of' => $child
                                    );
                                ?>

                                    <ul class="columns">
                                        <?php wp_list_categories( $args ); ?>
                                    </ul>
                    <?php endforeach;?>
                </div> <?php // end article section ?>

                <?php get_sidebar('members'); ?>

            </div>
        </article>

    <?php endwhile; else : ?>

        <?php get_template_part ('partials/no-post-found');?>

    <?php endif; ?>

    </div>

<?php get_footer(); ?>
