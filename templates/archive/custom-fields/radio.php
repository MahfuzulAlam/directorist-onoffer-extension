<?php
/**
 * @author  wpWax
 * @since   6.6
 * @version 6.7
 */

use \Directorist\Helper;

if ( ! defined( 'ABSPATH' ) ) exit;

$field_key = $args[ 'data' ][ 'original_field' ][ 'field_key' ];
?>

<?php if( $field_key == 'offer-type' ): ?>

<?php Helper::get_template('archive/custom-fields/offer', $args)?>

<?php else: ?>

<div class="directorist-listing-card-checkbox"><?php directorist_icon( $icon ); ?><?php $listings->print_label( $label ); ?><?php echo esc_html( $value ); ?></div>

<?php endif; ?>