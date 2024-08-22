<?php

/**
 * @author  wpwax
 * @since   1.0
 * @version 1.0
 */

class OnOffer_Custom_Taxonomies
{

    public function __construct()
    {
        add_action( 'init', [ $this, 'at_register_store_taxonomy' ] );

        add_action( 'store_add_form_fields', [ $this, 'at_store_add_new_meta_field' ], 10, 2 );
        add_action( 'store_edit_form_fields', [ $this, 'at_store_edit_meta_field' ], 10, 2 );
        add_action( 'edited_store', [ $this, 'at_save_store_custom_meta' ], 10, 2 );
        add_action( 'create_store', [ $this, 'at_save_store_custom_meta' ], 10, 2 );
    }

    public function at_register_store_taxonomy() {
        $labels = array(
            'name'              => _x( 'Stores', 'taxonomy general name' ),
            'singular_name'     => _x( 'Store', 'taxonomy singular name' ),
            'search_items'      => __( 'Search Stores' ),
            'all_items'         => __( 'All Stores' ),
            'parent_item'       => null,
            'parent_item_colon' => null,
            'edit_item'         => __( 'Edit Store' ),
            'update_item'       => __( 'Update Store' ),
            'add_new_item'      => __( 'Add New Store' ),
            'new_item_name'     => __( 'New Store Name' ),
            'menu_name'         => __( 'Store' ),
        );
    
        $args = array(
            'hierarchical'      => false, // Set to false for non-hierarchical taxonomy
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'store' ),
            'single_value'      => true,
        );
    
        register_taxonomy( 'store', array( 'at_biz_dir' ), $args );
    }

    // Add term page
    public function at_store_add_new_meta_field() {
        ?>
        <div class="form-field">
            <label for="term_meta[store_logo]"><?php _e( 'Store Logo', 'at_biz_dir' ); ?></label>
            <input type="text" name="term_meta[store_logo]" id="term_meta[store_logo]" value="">
            <p class="description"><?php _e( 'Enter the URL for the store logo.', 'at_biz_dir' ); ?></p>
        </div>
        <?php
    }

    // Edit term page
    function at_store_edit_meta_field($term) {
        $store_logo = get_term_meta( $term->term_id, 'store_logo', true ); ?>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="store_logo"><?php _e( 'Store Logo', 'at_biz_dir' ); ?></label></th>
            <td>
                <input type="text" name="store_logo" id="store_logo" value="<?php echo esc_attr( $store_logo ) ? esc_attr( $store_logo ) : ''; ?>">
                <p class="description"><?php _e( 'Enter the URL for the store logo.', 'at_biz_dir' ); ?></p>
            </td>
        </tr>
        <?php
    }

    // Save extra taxonomy fields callback function
    function at_save_store_custom_meta( $term_id ) {
        if ( isset( $_POST['store_logo'] ) ) {
            update_term_meta( $term_id, 'store_logo', $_POST['store_logo'] );
        }
    }

}

new OnOffer_Custom_Taxonomies();
