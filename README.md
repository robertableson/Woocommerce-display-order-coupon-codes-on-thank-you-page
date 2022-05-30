# Woocommerce PHP snippet to display order coupon codes on thank you page

This is a PHP snippet that lets you easily display all order coupon codes on the thank you page. You can also easily style the coupon codes with CSS by changing and using the current <code>ra-coupon-code</code> class.

Source: [Robert Ableson](https://robertableson.com/woocommerce-php-display-order-coupon-codes/)

## Integration

You can easily use this PHP snippet by either adding it to your child theme's functions.php file or by using a Wordpress plugin that let's you add php code like [Code Snippets](https://en-ca.wordpress.org/plugins/code-snippets/). 

## Snippet

```php
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
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
[MIT](https://choosealicense.com/licenses/mit/)