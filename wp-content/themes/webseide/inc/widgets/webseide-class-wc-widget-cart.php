<?php
/**
 * Shopping Cart Widget.
 *
 * Displays shopping cart widget.
 *
 * @package WooCommerce/Widgets
 * @version 2.3.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Widget cart class.
 */
class webseide_WC_Widget_Cart extends WC_Widget {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->widget_cssclass    = 'woocommerce widget_shopping_cart';
		$this->widget_description = __( 'Display the customer shopping cart.', 'woocommerce' );
		$this->widget_id          = 'woocommerce_widget_cart';
		$this->widget_name        = __( 'Cart', 'woocommerce' );
		$this->settings           = array(
			'title'         => array(
				'type'  => 'text',
				'std'   => __( 'Cart', 'woocommerce' ),
				'label' => __( 'Title', 'woocommerce' ),
			),
			'hide_if_empty' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Hide if cart is empty', 'woocommerce' ),
			),
		);

		parent::__construct();
	}

	/**
	 * Output widget.
	 *
	 * @see WP_Widget
	 *
	 * @param array $args     Arguments.
	 * @param array $instance Widget instance.
	 */
	public function widget( $args, $instance ) {
		global $woocommerce;
		
		if ( apply_filters( 'woocommerce_widget_cart_is_hidden', is_cart() || is_checkout() ) ) {
			return;
		}
		
		wp_enqueue_style('dashicons');
		
		$hide_if_empty 	= empty( $instance['hide_if_empty'] ) ? 0 : 1;
		$count 			= $woocommerce->cart->cart_contents_count;
		
		$this->widget_start( $args, $instance );

		if ( $hide_if_empty ) {
			echo '<div class="hide_cart_widget_if_empty">';
		}

		// Insert cart widget placeholder - code in woocommerce.js will update this on page load.
        echo '<div class="webseide-cart-widget"> 
                <a href="'. WC()->cart->get_cart_url() . '">
					<div class="cart-icon-holder"><span class="cart-icon dashicons dashicons-cart"></span>' . ($count > 0 ? '<span class="cart-count">('.$count.')</span>': '') . '</div>
                </a>
				</div>';

		if ( $hide_if_empty ) {
			echo '</div>';
		}

		$this->widget_end( $args );
	}
}
