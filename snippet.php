<?php

//PHP snippet to show the coupon codes used on an order as a totals row

function mn_add_row_to_order_details( $total_rows, $order ) {
	if( $order->get_coupon_codes() ) {
		$coupon_codes = '';

		foreach( $order->get_coupon_codes() as $coupon ) {
			$coupon_codes .= '<span class="ra-coupon-code">' . $coupon . '</span>, ';
		}
		
		$total_rows['coupon_codes'] = array(
		   'label' => __( 'Coupon codes used:', 'woocommerce' ),
		   'value'   => substr( $coupon_codes, 0, -2 )
		);
	}

	return $total_rows;
}

add_filter( 'woocommerce_get_order_item_totals', 'mn_add_row_to_order_details', 10, 2 );