<div class="sidebar sidebar-manual" role="complementary">

    <?php if ( is_active_sidebar( 'sidebar-manual' ) ) : ?>

        <?php dynamic_sidebar( 'sidebar-manual' ); ?>

    <?php else : ?>

        <?php
            /*
             * This content shows up if there are no widgets defined in the backend.
            */
        ?>

        <div class="no-widgets">
            <p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'bonestheme' );  ?></p>
        </div>

    <?php endif; ?>

    <?php if ( is_page( 986 ) || '986' == $post->post_parent ) {

        tablepress_print_table( array( 'id' => '26', 'use_datatables' => false, 'print_name' => false ) );

    } elseif ( is_page( 987 ) || '987' == $post->post_parent ) {

        tablepress_print_table( array( 'id' => '27', 'use_datatables' => false, 'print_name' => false ) );

    } elseif ( is_page( 988 ) || '988' == $post->post_parent ) {

        tablepress_print_table( array( 'id' => '28', 'use_datatables' => false, 'print_name' => false ) );

    } elseif ( is_page( 989 ) || '989' == $post->post_parent ) {

        tablepress_print_table( array( 'id' => '29', 'use_datatables' => false, 'print_name' => false ) );

    } elseif ( is_page( 990 ) || '990' == $post->post_parent ) {

        tablepress_print_table( array( 'id' => '30', 'use_datatables' => false, 'print_name' => false ) );

    } ?>

</div>
