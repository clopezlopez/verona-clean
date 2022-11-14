<?php



//Since v.1.1.3
//WEBTOFFEE SUBSCRIPTIONS COMPATIBILITY*/
/* Plugin URL: https://www.webtoffee.com/product/woocommerce-subscriptions/ */

//Since v.1.1.3
$getwebtoffeesubsht = get_option('wshk_enablewebtoffeesubsht');
if(isset($getwebtoffeesubsht) && $getwebtoffeesubsht == '3005')
{


if ( in_array( 'xa-woocommerce-subscriptions/xa-woocommerce-subscriptions.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    
      


//Since v.1.1.3
//Webtoffee Subscriptions compatibility - related-orders

function wshk_webtoffee_relatord_get_template( $located, $template_name, $args, $template_path, $default_path ) {    
    if ( 'myaccount/related-orders.php' == $template_name ) {
         
        $located = plugin_dir_path( __DIR__ ) . '/mytemplates/webtoffee-subscriptions/related-orders.php';
        
    }
    
    return $located;
    
}
add_filter( 'wc_get_template', 'wshk_webtoffee_relatord_get_template', 10, 5 );


//Since v.1.1.3
//Webtoffee Subscriptions compatibility - related-subscriptions

function wshk_webtoffee_relatsub_get_template( $located, $template_name, $args, $template_path, $default_path ) {    
    if ( 'myaccount/related-subscriptions.php' == $template_name ) {
         
        //$located = ABSPATH . '/wp-content/plugins/custom-redirections-for-wshk/mytemplates/related-subscriptions.php';
         $located = plugin_dir_path( __DIR__ ) . '/mytemplates/webtoffee-subscriptions/related-subscriptions.php';
        
    }
    
    return $located;
    
}
add_filter( 'wc_get_template', 'wshk_webtoffee_relatsub_get_template', 10, 5 );


//Since v.1.1.3
function wshk_webtoffee_mysub_get_template( $located, $template_name, $args, $template_path, $default_path ) {    
    if ( 'myaccount/view-subscription.php' == $template_name ) {
         
        $located = plugin_dir_path( __DIR__ ) . '/mytemplates/webtoffee-subscriptions/view-subscription.php';
        
    }
    
    return $located;
    
}
add_filter( 'wc_get_template', 'wshk_webtoffee_mysub_get_template', 10, 5 );



//Since 1.0.8
/*WooCommerce Subscriptions compatibility - custom redirection for add payment method form notice*/

/*add_action('plugins_loaded', 'wshk_woosubscriptions_cusre_paymethods', 11);

function wshk_woosubscriptions_cusre_paymethods() {
  if ( class_exists('WCS_My_Account_Payment_Methods') ) {
    
    remove_action( 'woocommerce_payment_token_set_default', array( 'WCS_My_Account_Payment_Methods', 'display_default_payment_token_change_notice' ), 10, 2 );
	remove_action( 'wp', array( 'WCS_My_Account_Payment_Methods', 'update_subscription_tokens' ) );
    
    require_once plugin_dir_path( __DIR__ ) . '/mytemplates/class-wcs-my-account-payment-methods.php' ;
   
    add_action( 'woocommerce_payment_token_set_default', array( 'custom_WCS_My_Account_Payment_Methods', 'display_default_payment_token_change_notice' ), 10, 2 );
	add_action( 'wp', array( 'custom_WCS_My_Account_Payment_Methods', 'update_subscription_tokens' ) );
   

  } else {
    add_action('admin_notices', 'wshk_wc_not_loaded');
  }
}

function wshk_wc_not_loaded() {
    printf(
      '<div class="error"><p>%s</p></div>',
      __('Sorry cannot use this function because Woo Subscriptions is not loaded')
    );
}*/


}
}

/*END WOO SUBSCRIPTIONS COMPATIBILITY*/






//Since v.1.1.3

/*SHOW THE SUBSCRIPTIONS*/
//Display the Webtoffee subscriptions table, If you want display in any page or post, use this shortcode [webtoffee_subscriptions]

//Since v.1.1.3
$getwebtoffeesubsht = get_option('wshk_enablewebtoffeesubsht');
if(isset($getwebtoffeesubsht) && $getwebtoffeesubsht == '3005')
{


function wshk_newstyle_webtoffeemysubscriptions() {
    /*wc_get_template( 'myaccount/form-edit-account.php', array( 'user' => get_user_by( 'id', get_current_user_id() ) ) ); */
    
   
    if (  is_user_logged_in() && ( is_account_page() ) ) {
ob_start();
    require plugin_dir_path( __DIR__ ) . '/mytemplates/webtoffee-subscriptions/subscriptions.php';
    //echo do_shortcode('[woo_myorders]');
    global $wp;

    if ( ! empty( $wp->query_vars ) ) {
      foreach ( $wp->query_vars as $key => $value ) {
        // Ignore pagename param.
        if ( 'edit-address' === $key ) {
          continue;
        }
        
        if ( 'add-payment-method' === $key ) {
          continue;
        }
        //since v.1.1.2
        if ( 'members-area' === $key ) {
                  continue;
                }
                
        if ( 'view-order' === $key ) {
          continue;
        }
        /*$orderlistact = get_option('wshk_enableorderscontrol');
if(isset($orderlistact) && $orderlistact == '140')
{
        if ( 'view-order' === $key ) {
          continue;
        }
}*/
        if ( 'payment-methods' === $key ) {
          continue;
        }
        


        if ( has_action( 'woocommerce_account_' . $key . '_endpoint' ) ) {
          do_action( 'woocommerce_account_' . $key . '_endpoint', $value );
          return ob_get_clean();
          
        }
      }
    }

    // No endpoint found? Default to dashboard.
    /*wc_get_template( 'myaccount/', array(
      'current_user' => get_user_by( 'id', get_current_user_id() ),
    ) );*/
    return ob_get_clean();
} 
}
add_shortcode ('webtoffee_subscriptions', 'wshk_newstyle_webtoffeemysubscriptions');

//Sustituir plantilla del tema por la del plugin
/*add_filter( 'wc_get_template', 'wshk_cma_get_templateesubwtf', 10, 5 );
function wshk_cma_get_templateesubwtf( $located, $template_name, $args, $template_path, $default_path ) {    
    if ( 'myaccount/view-subscriptions.php' == $template_name ) {
        $located = plugin_dir_path( __DIR__ ) . '/mytemplates/webtoffee-subscriptions/view-subscriptions.php';
    }
    
    return $located;
}*/

}






?>