<?php
/*
*
* Navigation fun - Different page templates, different menus
*
*/?>
<nav role="navigation" class="navigation">

    <?php if (is_page_template('page-members.php')) {

        wp_nav_menu(array(
            'container' => 'div',                               // remove nav container
            'container_class' => 'container',                   // class of container (should you choose to use it)
            'menu' => __( 'Members Menu', 'paradigm-group' ),   // nav name
            'menu_class' => 'nav top-nav',                      // adding custom nav class
            'theme_location' => 'members-nav',                  // where it's located in the theme
            'before' => '',                                     // before the menu
            'after' => '',                                      // after the menu
            'link_before' => '',                                // before each link
            'link_after' => '',                                 // after each link
            'depth' => 0,                                       // limit the depth of the nav
            'fallback_cb' => ''                                 // fallback function (if there is one)
        ));

    } elseif (is_page_template('page-providers.php')) {

        wp_nav_menu(array(
            'container' => 'div',                               // remove nav container
            'container_class' => 'container',                   // class of container (should you choose to use it)
            'menu' => __( 'Members Menu', 'paradigm-group' ),   // nav name
            'menu_class' => 'nav top-nav',                      // adding custom nav class
            'theme_location' => 'members-nav',                  // where it's located in the theme
            'before' => '',                                     // before the menu
            'after' => '',                                      // after the menu
            'link_before' => '',                                // before each link
            'link_after' => '',                                 // after each link
            'depth' => 0,                                       // limit the depth of the nav
            'fallback_cb' => ''                                 // fallback function (if there is one)
        ));

    } elseif (is_tax ('target_cat')) {

        wp_nav_menu(array(
            'container' => 'div',                               // remove nav container
            'container_class' => 'container',                   // class of container (should you choose to use it)
            'menu' => __( 'Members Menu', 'paradigm-group' ),   // nav name
            'menu_class' => 'nav top-nav',                      // adding custom nav class
            'theme_location' => 'members-nav',                  // where it's located in the theme
            'before' => '',                                     // before the menu
            'after' => '',                                      // after the menu
            'link_before' => '',                                // before each link
            'link_after' => '',                                 // after each link
            'depth' => 0,                                       // limit the depth of the nav
            'fallback_cb' => ''                                 // fallback function (if there is one)
        ));

    } else {

        wp_nav_menu(array(
            'container' => 'div',                               // remove nav container
            'container_class' => 'container',                   // class of container (should you choose to use it)
            'menu' => __( 'Main Menu', 'paradigm-group' ),      // nav name
            'menu_class' => 'nav top-nav',                      // adding custom nav class
            'theme_location' => 'main-nav',                     // where it's located in the theme
            'before' => '',                                     // before the menu
            'after' => '',                                      // after the menu
            'link_before' => '',                                // before each link
            'link_after' => '',                                 // after each link
            'depth' => 0,                                       // limit the depth of the nav
            'fallback_cb' => ''                                 // fallback function (if there is one)
        ));
    } ?>

</nav>
