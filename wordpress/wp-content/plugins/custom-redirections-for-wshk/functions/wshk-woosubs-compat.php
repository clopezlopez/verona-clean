<?php



//Since v.1.7.2 -1.0.8
//WOOCOMMERCE SUBSCRIPTIONS COMPATIBILITY*/
/* Plugin URL: https://woocommerce.com/products/woocommerce-subscriptions */

//Since v.1.7.8 -1.0.8
$woosubscompa = get_option('wshk_enablesubscription');
if(isset($woosubscompa) && $woosubscompa == '3002')
{


if ( in_array( 'woocommerce-subscriptions/woocommerce-subscriptions.php' || 'woocommerce-subscriptions-master/woocommerce-subscriptions.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    
      


//Since v.1.7.2 -1.0.8
//WooCommerce Subscriptions compatibility - related-orders

function wshk_relatord_get_template( $located, $template_name, $args, $template_path, $default_path ) {    
    if ( 'myaccount/related-orders.php' == $template_name ) {
         
        $located = plugin_dir_path( __DIR__ ) . '/mytemplates/related-orders.php';
        
    }
    
    return $located;
    
}
add_filter( 'wc_get_template', 'wshk_relatord_get_template', 10, 5 );


//Since v.1.7.2 -1.0.8
//WooCommerce Subscriptions compatibility - related-subscriptions

function wshk_relatsub_get_template( $located, $template_name, $args, $template_path, $default_path ) {    
    if ( 'myaccount/related-subscriptions.php' == $template_name ) {
         
        //$located = ABSPATH . '/wp-content/plugins/custom-redirections-for-wshk/mytemplates/related-subscriptions.php';
         $located = plugin_dir_path( __DIR__ ) . '/mytemplates/related-subscriptions.php';
        
    }
    
    return $located;
    
}
add_filter( 'wc_get_template', 'wshk_relatsub_get_template', 10, 5 );


//Since v.1.8.2 -1.0.8
function wshk_mysub_get_template( $located, $template_name, $args, $template_path, $default_path ) {    
    if ( 'myaccount/my-subscriptions.php' == $template_name ) {
         
        $located = plugin_dir_path( __DIR__ ) . '/mytemplates/my-subscriptions.php';
        
    }
    
    return $located;
    
}
add_filter( 'wc_get_template', 'wshk_mysub_get_template', 10, 5 );



//Since 1.0.8
/*WooCommerce Subscriptions compatibility - custom redirection for add payment method form notice*/

add_action('plugins_loaded', 'wshk_woosubscriptions_cusre_paymethods', 11);

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
}


}
}

/*END WOO SUBSCRIPTIONS COMPATIBILITY*/






//Since v.1.8.2 -1.0.8

/*SHOW THE SUBSCRIPTIONS*/
//Display the Woo subscriptions table, If you want display in any page or post, use this shortcode [woo_subscriptions]

//Since v.1.7.8
$woosubssht = get_option('wshk_enablesubscriptionshortcode');
if(isset($woosubssht) && $woosubssht == '3003')
{


function wshk_newstyle_mysubscriptions() {
    /*wc_get_template( 'myaccount/form-edit-account.php', array( 'user' => get_user_by( 'id', get_current_user_id() ) ) ); */
    
   
    if (  is_user_logged_in() && ( is_account_page() ) ) {
ob_start();
    //require dirname( __FILE__ ) . '/mytemplates/my-subscriptions.php';
    echo do_shortcode('[subscriptions]');
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
        $orderlistact = get_option('wshk_enableorderscontrol');
if(isset($orderlistact) && $orderlistact == '140')
{
        /*if ( 'view-order' === $key ) {
          continue;
        }*/
}
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
add_shortcode ('woo_mysubscriptions', 'wshk_newstyle_mysubscriptions');

//Sustituir plantilla del tema por la del plugin
add_filter( 'wc_get_template', 'wshk_cma_get_templateesub', 10, 5 );
function wshk_cma_get_templateesub( $located, $template_name, $args, $template_path, $default_path ) {    
    if ( 'myaccount/view-subscription.php' == $template_name ) {
        $located = plugin_dir_path( __DIR__ ) . '/mytemplates/view-subscription.php';
    }
    
    return $located;
}

}






?>