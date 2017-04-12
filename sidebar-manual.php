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

    <?php if ( is_page( 986 ) ) { ?>

        <?php tablepress_print_table( array( 'id' => '1', 'use_datatables' => true, 'print_name' => false ) ); ?>

    <?php } ?>

</div>
