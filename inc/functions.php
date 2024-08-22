<?php

/**
 * Add your custom php code here
 */


add_filter('directorist_custom_field_meta_key_field_args', function ($args) {
    $args['type'] = 'text';
    return $args;
});


/**
 * Template Exists
 */
function onoffer_template_exists( $template_file ) {
    $file = DIRECTORIST_ONOFFER_DIR . '/templates/' . $template_file . '.php';

    if ( file_exists( $file ) ) {
        return true;
    } else {
        return false;
    }

}

/**
 * Get Template
 */
function onoffer_get_template( $template_file, $args = [] ) {

    if ( is_array( $args ) ) {
        extract( $args );
    }

    $data = $args;

    if ( isset( $args['form'] ) ) {
        $listing_form = $args['form'];
    }

    $file = DIRECTORIST_ONOFFER_DIR . '/templates/' . $template_file . '.php';

    if ( onoffer_template_exists( $template_file ) ) {
        include $file;
    }

}
