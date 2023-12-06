/*Shortcode to display custom text using a shortcode on a specific product via its product ID

function custom_text_shortcode($atts) 
{
    //Define the product IDs to display the text
    $product_ids = array(XXX); //Array of product IDs - Separate using comma for multiple IDs

    //Get the current product ID
    global $product;
    $current_product_id = $product->get_id();

    //Check if the current product is in the list of product IDs
    if (in_array($current_product_id, $product_ids)) 
	{
        //Custom text
		return'<p><strong>MESSAGE!</strong><br>TYPE MESSAGE HERE</p>';      
    }
    //Return nothing if not on the specified products
    return '';
}
add_shortcode('custom_text', 'custom_text_shortcode');