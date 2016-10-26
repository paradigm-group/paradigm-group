<header class="article-header page-header">

    <div class="container">
        <?php
            global $wp_query;
            $term = $wp_query->get_queried_object();
            $title = $term->name;
        ?>
        <h1 class="page-title">Welcome to Target <br>
        <?php echo $title;?></h1>
    </div>
</header>

<div class="container">

    <div class="entry-content main">

        <?php echo category_description( $category_id ); ?>

        <p>If you have any queries regarding Target, please contact: <a href="mailto:helpdesk@paradigmgroup.eu">helpdesk@paradigmgroup.eu</a></p>
        <p>You can also follow us on Twitter for information updates <a href="http://www.twitter.com/@Paradigmtechnic">@ParadigmTechnic</a></p>

        <?php
            global $wp_query;

            $term_id = $wp_query->queried_object_id;
            $term_meta = get_option( "taxonomy_$term_id" );
            $pdfurl = $term_meta['tax_pdf'];
            $wordurl = $term_meta ['tax_word'];
        ?>

        <?php if( ! empty( $term_meta['tax_pdf'] ) ) { ?>
            <p><a href="<?php echo $pdfurl; ?>">PDF Version</a></p>
        <?php } else {} ?>
        <?php if( ! empty( $term_meta['tax_word'] ) ) { ?>
            <p><a href="<?php echo $wordurl; ?>">Word Version</a></p>
        <?php } else {} ?>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

                <header class="article-header">

                    <h1><?php the_title(); ?></h1>

                </header> <!-- end article header -->

                <div class="entry-content clearfix">

                    <?php the_content(); ?>

                </div> <!-- end article section -->

                <footer class="article-footer">
                    <p><a href="#top">Back to top&hellip;</a></p>
                </footer> <!-- end article footer -->

            </article> <!-- end article -->

        <?php endwhile; ?>

        <?php else : ?>

            <article id="post-not-found" class="hentry clearfix">
                <header class="article-header">
                    <h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
                </header>
                <section class="entry-content">
                    <p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
                </section>
                <footer class="article-footer">
                        <p><?php _e( 'This is the error message in the target archive template.', 'bonestheme' ); ?></p>
                </footer>
            </article>

        <?php endif; ?>
        <p><strong>Back issues of Target are posted here for reference purposes but please note that guidance contained in older editions may not be the most current. We recommend that any search for information begins with the most recent edition.</strong></p>
    </div>

    <div class="sidebar sidebar-target">
        <h2>Contents</h2>
            <ul>
                <?php foreach($posts as $post) { setup_postdata($post);  ?>
                    <li>
                        <a href="<?php get_category_link( $category_id ); ?> #post-<?php the_id ();?>">
                            <?php echo the_title();?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
    </div>

</div>
