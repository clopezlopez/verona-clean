<?php
/**
 * Order again button
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-again.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}



$theme = wp_get_theme(); // gets the current theme
if ( 'Storefront' == $theme->name || 'Storefront' == $theme->parent_theme ) {
    // if you're here Twenty Twelve is the active theme or is
    // the current theme's parent theme



?>

<style>
    
    
    
    
    p.order-again .button.again::after {
        
        
        /*font-variant: all-petite-caps !important;*/
         content: "\f217" !important;
    }
    
    p.order-again .button.view::after {
	
    content: "\f057" !important;
    /*font-variant: all-petite-caps !important;*/
    
    
   
}
    

    
</style>

<?php } ?>

<p class="order-again">
    <br />
	<a href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'order_again', $order->get_id() ) , 'woocommerce-order_again' ) ); ?>" class="button again"><?php _e( 'Order again', 'woocommerce' ); ?></a>
	<?php 
	
	/*global $pluginOptionsVal;
$pluginOptionsVal=get_wshk_sidebar_options();

if(isset($pluginOptionsVal['wshk_enablescusre']) && $pluginOptionsVal['wshk_enablescusre']==99)
{*/
$getenablescusre = get_option('wshk_enablescusre');
if ( isset($getenablescusre) && $getenablescusre =='99')
    {

$wshkvieworderid = get_option('wshk_vieworderid');
?>

<style>
    
    
    
</style>


	<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?><?php echo  $wshkvieworderid; ?>" class="button view"><?php _e( 'Close', 'woocommerce' ) ?>
</a>
</p>
<br />

<?php } ?>