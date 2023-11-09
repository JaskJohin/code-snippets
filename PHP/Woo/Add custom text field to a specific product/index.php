<?php

/*Add custom text field to a product with ID XXXX*/

	add_action('woocommerce_before_add_to_cart_button', 'custom_text_field_for_specific_product');

	function custom_text_field_for_specific_product() 
	{
		global $product;
		if ($product->get_id() === XXXX) //Product ID
		{ 
			echo '<div class="custom-text-field">';
			woocommerce_form_field('custom_text', array
			(
				'type' => 'text',
				'class' => array('input-text'),
				'label' => __('CUSTOM LABEL HERE', 'woocommerce'),
				'maxlength' => 8, //Max length of the custom field
				'required' => true, //Required field			
			));
			echo '</div>';
		}
	}

	//Store custom text to the cart item data
	add_filter('woocommerce_add_cart_item_data', 'save_custom_text_to_cart', 10, 2);

	function save_custom_text_to_cart($cart_item_data, $product_id) 
	{
		if (isset($_POST['custom_text'])) 
		{
			$cart_item_data['custom_text'] = sanitize_text_field($_POST['custom_text']);
		}
		return $cart_item_data;
	}

	//Display custom text in cart
	add_filter('woocommerce_get_item_data', 'display_custom_text_in_cart', 10, 2);

	function display_custom_text_in_cart($item_data, $cart_item) 
	{
		if (isset($cart_item['custom_text'])) 
		{
			$item_data[] = array
			(
				'key'   => 'CUSTOM KEY HERE THAT APPEARS IN THE CART', //Custom text to appear in the cart
				'value' => wc_clean($cart_item['custom_text']),
			);
		}
		return $item_data;
	}

	//Display custom text in order
	add_action('woocommerce_checkout_create_order_line_item', 'add_custom_text_to_order_item', 10, 4);

	function add_custom_text_to_order_item($item, $cart_item_key, $values, $order) 
	{
		if (isset($values['custom_text'])) 
		{
			$item->add_meta_data('CUSTOM KEY HERE THAT APPEARS IN THE ORDER', $values['custom_text'], true); //Custom text to appear in the order
		}
	}
?>