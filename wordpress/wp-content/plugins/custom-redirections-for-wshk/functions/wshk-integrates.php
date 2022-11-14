<?php

/*The following functions are directly integrates on WSHK settings, inside of each free function. After activate WSHK PRO all the functions will be unlocked on each related WSHK free function.*/

//Since v.1.1.2
//Display saving price and percentages on sale products - Shortcode
//This function will unlock the shortcode to display the saving price and percentages on sale producs with a shortcode in your custom product page. Its compatible with Elementor templates too.

//IMPORTANT - This function replace the by default sale badge!
//Usage - Check the shortoce box and use the shortcode [woo_sale_badge] into the product page or Elementor product template.


//Check for use the shortcode
$getenablesavingprices = get_option('wshk_enablesavingprices');
if ( isset($getenablesavingprices) && $getenablesavingprices =='24')
    {
    $getwshksalebadgesht = get_option('wshk_salebadge_sht');
    if ( isset($getwshksalebadgesht) && $getwshksalebadgesht =='shtsalebadgeon')
        {

    add_filter( 'woocommerce_sale_flash', 'wshk_sht_percentage_to_sale_badge', 20, 3);
    function wshk_sht_percentage_to_sale_badge( $html, $post, $product ) {
        if( $product->is_type('variable')){
            $percentages = $savings = array(); // Initializing
    
    			// Get all variation prices
    			$prices = $product->get_variation_prices();
    
    			// Loop through variation prices
    			foreach( $prices['price'] as $key => $price ){
    				// Only on sale variations
    				if( $prices['regular_price'][$key] !== $price ){
    					// Calculate and set in the array the percentage for each variation on sale
    					$percentages[] = round(100 - ($prices['sale_price'][$key] / $prices['regular_price'][$key] * 100), 1 );
    					// Calculate and set in the array the savings for each variation on sale
    					$savings[]     = $prices['regular_price'][$key] - $prices['sale_price'][$key];
    				}
    			}
    
    			$save_price = wc_price( max($savings) );
    
    			if( min($percentages) !== max($percentages) ){
    				$save_percentage = min($percentages) . '-' . max($percentages) . '%';
    				$save_text       = __( 'Save up to:', 'woo-shortcodes-kit' );
    			} else {
    				$save_percentage = max($percentages) . '%';
    				$save_text       = __( 'Save:', 'woo-shortcodes-kit' );
    			}
    		}		
    		// All other product types
    		else {
    			$regular_price   = $product->get_regular_price();
    			$sale_price      = $product->get_sale_price();
    			$save_price      = wc_price( $regular_price - $sale_price );
    			$save_percentage = round( 100 - ( $sale_price / $regular_price * 100 ), 1 ) . '%';
    			$save_text       = __( 'Save:', 'woo-shortcodes-kit' );
    			
    			// Style on product page
    			if(is_product()){
    			?>
    			<style> 
    			
    			#tab-description > p.on-sale {
    			display:block !important;
    			}
    			</style>
    			<?php
    			}
    						
    			if(is_shop() || is_product() || is_product_category() || is_product_tag()){
    				?>
    			<style>
    			.on-sale {display:none;}
    			</style>	
    			<?php
    			}
    		}
    		
    		//style options
    		$getonsalebg = get_option('wshk_onsalebg');
    		$getonsalebdsize = get_option('wshk_onsalebdsize');
    		$getonsalebdtype = get_option('wshk_onsalebdtype');
    		$getonsalebdcolor = get_option('wshk_onsalebdcolor');
    		$getonsalebdradius = get_option('wshk_onsalebdradius');
    		
    		$getonsaletextsize = get_option('wshk_onsaletextsize');
    		$getonsaletxtweight = get_option('wshk_onsaletxtweight');
    		$getonsaleftcolor = get_option('wshk_onsaleftcolor');
    		$getonsaletxttransf = get_option('wshk_onsaletxttransf');
    		$getonsalepadding = get_option('wshk_onsalepadding');
    
    		return '
    		<style>
    			
    			.on-sale {
    			background-color:'.$getonsalebg.';
    			color:'.$getonsaleftcolor.';
    			border:'.$getonsalebdsize.'px '.$getonsalebdtype.' '. $getonsalebdcolor .';
    			border-radius:'.$getonsalebdradius.';
    			padding:'.$getonsalepadding.';   
    			text-transform:'.$getonsaletxttransf.';
    			font-weight:'.$getonsaletxtweight.';
    			font-size:'.$getonsaletextsize.';		
    			margin-top: 10px !important;
    			width:fit-content;			
    			}
    			
    			span.onsale {
    			  /*display:none !important;*/
    		    }
    			div.inside-wc-product-image > p.on-sale {
    			margin: auto;
        		margin-bottom: 20px;
    			position: absolute;
    			top: -40px;
    			width: 40%;
    			left: 175px;
    			}
    			
    		</style>
    		<p class="on-sale">' . sprintf( '%s %s (%s)', $save_text, $save_price, $save_percentage ) . '</p>';
    }
    
    function wshk_sht_product_sale_flash() {
            wc_get_template( 'single-product/sale-flash.php' );
        }
    add_shortcode('woo_sale_badge', 'wshk_sht_product_sale_flash');
    }
}
?>