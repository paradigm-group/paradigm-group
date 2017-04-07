			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="container">

                    <nav role="navigation">
                        <?php wp_nav_menu(array(
                            'container' => '',                              // remove nav container
                            'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
                            'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
                            'menu_class' => 'nav footer-nav cf',            // adding custom nav class
                            'theme_location' => 'footer-links',             // where it's located in the theme
                            'before' => '',                                 // before the menu
                            'after' => '',                                  // after the menu
                            'link_before' => '',                            // before each link
                            'link_after' => '',                             // after each link
                            'depth' => 0,                                   // limit the depth of the nav
                            'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
                        )); ?>
                    </nav>

					<p class="source-org copyright">
                        &copy; <?php echo date('Y'); ?> Paradigm Partners Ltd | Registered in England and Wales. Company No.: 09902499 | Paradigm Partners Ltd, Paradigm House, Brooke Court, Wilmslow, Cheshire, SK9 3ND |
                    </p>

				</div>

			</footer>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
