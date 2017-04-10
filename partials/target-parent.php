<header class="article-header">

    <div class="container">

        <h1 class="page-title"><?php single_cat_title(); ?> Target Archive</h1>

    </div>
</header>

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

            <div class="twelvecol">

                <div class="twocol">

                    <a href="http://paradigmgroup.eu/issue/<?php echo $category->slug; ?>"><img  class="shadow" src="<?php echo $url; ?>"/></a>

                </div>

                <div class="ninecol">

                    <?php if( ! empty( $term_meta['tax_pdf'] ) ) { ?>
                        <a href="<?php echo $pdfurl; ?>">PDF</a>
                    <?php } else {} ?>
                    <?php if( ! empty( $term_meta['tax_word'] ) ) { ?>
                        <a href="<?php echo $wordurl; ?>">Word</a>
                    <?php } else {} ?>

                    <?php $posts = get_posts( array(
                        'target_cat' => $category->slug,
                        'post_type' => 'target'
                    ))?>

                        <ul>

                        <?php foreach($posts as $post) { setup_postdata($post);  ?>

                            <li><?php echo the_title();?></li>

                        <?php } ?>

                        </ul>

                </div>

            </div>
        <?php } ?>
    </section>
</div>
</div>
<?php get_sidebar('members');?>