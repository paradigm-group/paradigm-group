<header class="article-header">

    <div class="container">

        <h1 class="page-title"><?php single_cat_title(); ?> Target Archive</h1>

    </div>

</header>

<?php
    $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
    $parent = get_term($term->parent, get_query_var('taxonomy') );
?>

<div class="container">

    <div class="main">

        <p id="breadcrumbs">
            <span xmlns:v="http://rdf.data-vocabulary.org/#">
                <span typeof="v:Breadcrumb"><a href="/" rel="v:url" property="v:title">Home</a></span> » <span typeof="v:Breadcrumb"><a href="/members-area/" rel="v:url" property="v:title">Members Area</a></span> » <span typeof="v:Breadcrumb"><a href="/members-area/safeguard/" rel="v:url" property="v:title">Safeguard</a></span> » <span typeof="v:Breadcrumb"><a href="/members-area/safeguard/technical-services/" rel="v:url" property="v:title">Technical Services</a></span> » <span typeof="v:Breadcrumb"><span class="breadcrumb_last" property="v:title"><a href="/members-area/safeguard/technical-services/target/" rel="v:url" property="v:title">Target</a></span></span> » <?php single_cat_title(); ?>
            </span>
        </p>

        <p><strong>Back issues of Target are posted here for reference purposes but please note that guidance contained in older editions may not be the most current.  We recommend that any search for information begins with the most recent edition.</strong></p>

    <section class="entry-content clearfix">

        <?php

            $categories2 = get_terms('target_cat',array(
                'orderby' => 'slug',
                'order' => 'DESC',
                'parent' => $term->term_id ,
                'hide_empty'=> '1' ));

                    foreach ( $categories2 as $category ) {

                    $term_id = $category->term_id;
                    $term_meta = get_option( "taxonomy_$term_id" );
                    $url = $term_meta['tax_image'];
                    $pdfurl = $term_meta['tax_pdf'];
                    $wordurl = $term_meta ['tax_word'];

        ?>

            <h2>
                <a href="http://paradigmgroup.eu/issue/<?php echo $category->slug; ?>">
                    <?php echo $category->name;?>
                </a>
            </h2>

            <div class="container">
                <div class="target-archive-image">
                    <a href="/issue/<?php echo $category->slug; ?>"><img class="target-cover alignleft" src="<?php echo $url; ?>"/></a>
                </div>
                <div class="target-archive-details">
                    <?php if( ! empty( $term_meta['tax_pdf'] ) ) { ?>
                        <strong><a href="<?php echo $pdfurl; ?>">Dowmload PDF</a></strong>
                    <?php } else {} ?>
                    <?php if( ! empty( $term_meta['tax_word'] ) ) { ?>
                        <strong><a href="<?php echo $wordurl; ?>">Download Word</a></strong>
                    <?php } else {} ?>

                    <?php $posts = get_posts( array(
                        'target_cat'        => $category->slug,
                        'post_type'         => 'target',
                        'posts_per_page'    => -1
                    ))?>

                    <ul>

                        <?php foreach($posts as $post) { setup_postdata($post);  ?>

                            <li>
                                <a href="/issue/<?php echo $category->slug; ?>/#post-<?php echo the_id();?>">
                                    <?php echo the_title();?>
                                </a>
                            </li>

                        <?php } ?>

                    </ul>
                </div>
            </div>
        <?php } ?>
    </section>
</div>
    <?php get_sidebar('members');?>
</div>

