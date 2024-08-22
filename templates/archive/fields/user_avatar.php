<?php
/**
 * @author  wpWax
 * @since   6.6
 * @version 7.3.1
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$alignment =  !empty( $data['align'] ) ? $data['align'] : '' ;

$stores = get_the_terms( get_the_ID(), 'store' );

$store_logo = $stores && count( $stores ) > 0 ? get_term_meta( $stores[0]->term_id, 'store_logo', true ): '';

?>
<div class="directorist-thumb-listing-author directorist-alignment-<?php echo esc_attr( $alignment ) ?>">
	<a href="<?php echo esc_url( $listings->loop['author_link'] ); ?>" aria-label="<?php echo esc_attr( $listings->loop['author_full_name'] ); ?>" class="<?php echo esc_attr( $listings->loop['author_link_class'] ); ?>">
		<?php if ($listings->loop['u_pro_pic'] || $store_logo) { ?>
			<img src="<?php echo esc_url( $store_logo ? $store_logo :$listings->loop['u_pro_pic'][0]); ?>" alt="<?php esc_attr_e( 'Author Image', 'directorist' );?>">
			<?php
		}
		else {
			echo wp_kses_post( $listings->loop['avatar_img'] );
		}
		?>
	</a>
</div>