<?php get_header(); ?>

    <div id="content">

        <?php

            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            $parent = get_term($term->parent, get_query_var('taxonomy') );

            if($term->parent > 0)  {
        ?>

            <header class="article-header page-header">

                <div class="container">
                    <h1 class="page-title">Welcome to Target</h1>

                    <?php if( is_tax() ) {
                        global $wp_query;
                        $term = $wp_query->get_queried_object();
                            $title = $term->name; }?>

                        <p><?php echo $title; ?></p>
                    } ?>
                </div>
            </header>

            <div class="container">
                <div class="ninecol first">
                    <div class="entry-content intro">

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

                        <?php if( ! empty( $term_meta['tax_pdf'] ) ) { ?><p><a href="<?php echo $pdfurl; ?>">PDF Version</a></p><?php } else {} ?>
                        <?php if( ! empty( $term_meta['tax_word'] ) ) { ?><p><a href="<?php echo $wordurl; ?>">Word Version</a></p><?php } else {} ?>

                        </div>

                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                                <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

                                    <header class="article-header">

                                        <h1 class="h2"><?php the_title(); ?></h1>

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
                        </div>
                        <div class="threecol targetcontents entry-content last">
                          <h2>Contents</h2>
                            <ul>
                              <?php foreach($posts as $post) { setup_postdata($post);  ?>
                                <li><a href="<?php get_category_link( $category_id ); ?> #post-<?php the_id ();?>"><?php echo the_title();?></a></li>
                              <?php } ?>
                            </ul>
                        </div>
                        <div class="twelvecol">
                            <p><b>Back issues of Target are posted here for reference purposes but please note that guidance contained in older editions may not be the most current. We recommend that any search for information begins with the most recent edition.</b></p>
                        </div>
                    </div>
                <?php } else { ?>

                    <?php get_sidebar( 'technical' ); ?>

                        <div id="main" class="ninecol clearfix" role="main">

                            <div class="breadcrumbs">
                                <span xmlns:v="http://rdf.data-vocabulary.org/#">
                                <span typeof="v:Breadcrumb"><a href="http://paradigmgroup.eu" rel="v:url" property="v:title">Home</a></span> » <span typeof="v:Breadcrumb"><a href="http://paradigmgroup.eu/members-area/" rel="v:url" property="v:title">Members Area</a></span> » <span typeof="v:Breadcrumb"><a href="http://paradigmgroup.eu/members-area/safeguard/" rel="v:url" property="v:title">Safeguard</a></span> » <span typeof="v:Breadcrumb"><a href="http://paradigmgroup.eu/members-area/safeguard/technical-services/" rel="v:url" property="v:title">Technical Services</a></span> » <span typeof="v:Breadcrumb"><span class="breadcrumb_last" property="v:title"><a href="http://paradigmgroup.eu/members-area/safeguard/technical-services/target/" rel="v:url" property="v:title">Target</a></span></span> » <?php single_cat_title(); ?>
                              </span>
                            </div>

                            <h1><?php single_cat_title(); ?> Target Archive</h1>

                                <p><b>Back issues of Target are posted here for reference purposes but please note that guidance contained in older editions may not be the most current.  We recommend that any search for information begins with the most recent edition.</b></p>

												<section class="entry-content clearfix">

													<?php

														$categories2 = get_terms('target_cat',array('orderby' => 'slug', 'order' => 'DESC','parent' => $term->term_id , 'hide_empty'=> '1' ));

															foreach ( $categories2 as $category ) {

																$term_id = $category->term_id;
																$term_meta = get_option( "taxonomy_$term_id" );
																$url = $term_meta['tax_image'];
																$pdfurl = $term_meta['tax_pdf'];
																$wordurl = $term_meta ['tax_word'];

													?>

														<h2><a href="http://paradigmgroup.eu/issue/<?php echo $category->slug; ?>"><?php echo $category->name;?></a></h2>

														<div class="twelvecol">

															<div class="twocol">

																<a href="http://paradigmgroup.eu/issue/<?php echo $category->slug; ?>"><img  class="shadow" src="<?php echo $url; ?>"/></a>

															</div>

															<div class="ninecol">

																<?php if( ! empty( $term_meta['tax_pdf'] ) ) { ?><a href="<?php echo $pdfurl; ?>">PDF</a><?php } else {} ?> <?php if( ! empty( $term_meta['tax_word'] ) ) { ?><a href="<?php echo $wordurl; ?>">Word</a><?php } else {} ?>

																<?php $posts = get_posts( array( 'target_cat' => $category->slug, 'post_type' => 'target' ) );  ?>

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
									<?php } ?>

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer (); ?>
