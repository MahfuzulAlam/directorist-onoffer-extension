<?php
    /**
     * @author  wpWax
     * @since   6.6
     * @version 6.7
     */

    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }

    $label = $value && $value == 'fixed' ? 'Fixed' : 'Percentage' ;
    $price = get_post_meta( get_the_ID(), '_price', true );

?>

<div class="directorist-listing-card-offer">
    <h3>
        <?php echo $label; ?>
        <?php echo atbdp_currency_symbol( directorist_get_currency() ) . $price; ?>
    </h3>
</div>