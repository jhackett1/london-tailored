<?php

// Add meta box
add_action( 'add_meta_boxes', 'ltx_metaboxes_setup' );
function ltx_metaboxes_setup(){
    add_meta_box( 'ltx_tours_metabox', 'Show on homepage?', 'ltx_tours_metabox_content', 'tours', 'side', 'high');
}

// Fill with content
function ltx_tours_metabox_content( $post ) {
    $meta = get_post_meta( $post->ID );
    $show_on_homepage_value = ( isset( $meta['show_on_homepage_value'][0] ) &&  '1' === $meta['show_on_homepage_value'][0] ) ? 1 : 0;
    wp_nonce_field( 'ltx_control_meta_box', 'ltx_control_meta_box_nonce' ); // Always add nonce to your meta boxes!
    ?>
        <p>
            <label><input type="checkbox" name="show_on_homepage_value" value="1" <?php checked( $show_on_homepage_value, 1 ); ?> /><?php esc_attr_e( 'Yes, show on homepage', 'ltx' ); ?></label>
        </p>
    <?php
}

// Save value
add_action( 'save_post', 'ltx_save_metaboxes' );
function ltx_save_metaboxes( $post_id ) {

    if ( ! isset( $_POST['ltx_control_meta_box_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['ltx_control_meta_box_nonce'] ), 'ltx_control_meta_box' ) ) { // Input var okay.
        return $post_id;
    }

    // Check the user's permissions.
    if ( isset( $_POST['post_type'] ) && 'page' === $_POST['post_type'] ) { // Input var okay.
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return $post_id;
        }
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

    $show_on_homepage_value = ( isset( $_POST['show_on_homepage_value'] ) && '1' === $_POST['show_on_homepage_value'] ) ? 1 : 0; // Input var okay.
    update_post_meta( $post_id, 'show_on_homepage_value', esc_attr( $show_on_homepage_value ) );
}

 
