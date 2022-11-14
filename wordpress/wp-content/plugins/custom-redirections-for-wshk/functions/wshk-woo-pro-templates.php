<?php


//ORDER AGAIN - close button

$orderlistact = get_option('wshk_enableorderscontrol');
if(isset($orderlistact) && $orderlistact == '140')
{
function wshk_order_again_get_template( $located, $template_name, $args, $template_path, $default_path ) {   
        
    if ( 'order/order-again.php' == $template_name ) {
        $located = plugin_dir_path( __DIR__ ) . 'mytemplates/order-again.php';
        
        //$located = ABSPATH . '/wp-content/plugins/custom-redirections-for-wshk/mytemplates/order-again.php';
    }
    
    return $located;
    
}
add_filter( 'wc_get_template', 'wshk_order_again_get_template', 10, 5 );
}


//FORM ADD PAYMENT METHOD - custom redirection

//Since v.1.6.8
//Sustituir plantilla del tema por la del plugin

/*function wshk_pcma_get_templateeh( $located, $template_name, $args, $template_path, $default_path ) {    
    if ( 'myaccount/form-add-payment-method.php' == $template_name ) {
         
        $located = ABSPATH . '/wp-content/plugins/custom-redirections-for-wshk/mytemplates/form-add-payment-method.php';
        
    }
    
    return $located;
    
}
add_filter( 'wc_get_template', 'wshk_pcma_get_templateeh', 10, 5 );*/



//Sustituir plantilla del tema por la del plugin

/*function wshk_pcma_get_templatee( $located, $template_name, $args, $template_path, $default_path ) {    
    if ( 'myaccount/payment-methods.php' == $template_name ) {
         
        $located = plugin_dir_path( __DIR__ ) . '/mytemplates/payment-methods.php';
        //$located = ABSPATH . '/wp-content/plugins/custom-redirections-for-wshk/mytemplates/payment-methods.php';
        
    }
    
    return $located;
    
}
add_filter( 'wc_get_template', 'wshk_pcma_get_templatee', 10, 5 );*/
?>