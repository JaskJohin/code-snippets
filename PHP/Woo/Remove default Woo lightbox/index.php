<?php

/*Remove WooCommerce default lightbox*/
	add_action( 'after_setup_theme', 'remove_lightbox_theme_support', 99 );
	function remove_lightbox_theme_support() 
	{
		remove_theme_support( 'wc-product-gallery-lightbox' );	
	}
?>