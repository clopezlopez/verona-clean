<?php

//Since v.1.1.2
//Woo Membership compatible with WSHK PRO


$getenablemembershipcompat = get_option('wshk_enablemembershipcompat');
if ( isset($getenablemembershipcompat) && $getenablemembershipcompat =='3005')
    {

if ( in_array( 'woocommerce-memberships/woocommerce-memberships.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

//Custom shortcode to display membership table

function wshk_wc_memberships_my_memberships_shortcode() {

	// bail if Memberships isn't active or we're in the admin
	if ( ! function_exists( 'wc_memberships' ) || is_admin() ) {
		return;
	}
	
    if(is_account_page()){
	// buffer contents
	ob_start();

	?>
	<style>
	    /*tr.my-membership-detail-user-membership-actions{
	        display:none;
	    }*/
	    /*a.button.cancel {display:none;}*/
	</style>
	<div class="woocommerce">
	<h2 class="wshkcustmembershiptitle"><?php esc_html_e( 'My Memberships', 'textdomain' ); ?></h2>
	<?php
		wc_get_template( 'myaccount/my-memberships.php', array(
			'customer_memberships' => wc_memberships_get_user_memberships(),
			'user_id'              => get_current_user_id(),
		) );
	?>
	</div>
	<?php

	// output buffered content
	return ob_get_clean();
    }
}
add_shortcode( 'woo_memberships_table', 'wshk_wc_memberships_my_memberships_shortcode' );



//Custom shortcode to display membership content

//WOO MEMBERSHIP TEST - CONTENT SHORTCODE

function wshk_newstyle_mymembership() {
        
       
        if (  is_user_logged_in() && ( is_account_page() ) ) {
            
            ob_start();
            
            require dirname( __DIR__ ) . '/mytemplates/my-membership-navigation.php';
            
            //Hide view button if membership is not active
            if (empty( wc_memberships_get_user_active_memberships())){
    	    echo'
    	    <style>
    	        td.membership-actions > a.button.view {
                display:none;
                }
                
                td.membership-actions > a.button.cancel {
                display:none;
                }
    	    </style>
    	    ';
    	    }
            
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
            
            //Since v.1.8.2 - v.1.9.1
        
            $getenablesubscriptionshortcode = get_option('wshk_enablesubscriptionshortcode');
            if ( isset($getenablesubscriptionshortcode) && $getenablesubscriptionshortcode =='3003')
                {
                    
                if ( 'view-subscription' === $key ) {
                  continue;
        
                }//Activar solo si se usa el shortcode
            }
            
            //Since v.1.1.3
        
            $getwebtoffeesubsht = get_option('wshk_enablewebtoffeesubsht');
            if ( isset($getwebtoffeesubsht) && $getwebtoffeesubsht =='3005')
                {
                    
                if ( 'view-subscription' === $key ) {
                  continue;
        
                }//Activar solo si se usa el shortcode
            }
            
            if ( 'payment-methods' === $key ) {
              continue;
            }
            
            if ( 'view-order' === $key ) {
                  continue;
                }
    
            if ( has_action( 'woocommerce_account_' . $key . '_endpoint' ) ) {
              do_action( 'woocommerce_account_' . $key . '_endpoint', $value );
              return ob_get_clean();
              
            }
          }
        }
    
        // No endpoint found?
        return ob_get_clean();
        } 
    }
    add_shortcode ('woo_membership_content', 'wshk_newstyle_mymembership');

//Sustituir plantilla del tema por la del plugin
    add_filter( 'wc_get_template', 'wshk_woomember_get_templatee', 10, 5 );
    function wshk_woomember_get_templatee( $located, $template_name, $args, $template_path, $default_path ) {    
        if ( 'myaccount/my-memberships.php' == $template_name ) {
            $located = plugin_dir_path( __DIR__ ) . 'mytemplates/my-memberships.php';
        }
        
        return $located;
    }
    
    

    //Custom view button redirection
    
    function wshk_change_members_area_view_link( $default_actions, $user_membership, $object ) {
    
    	$members_area = $user_membership->get_plan()->get_members_area_sections();
    	
    	// let's make our keys = values so we don't need to know array position & can use section id below
    	$members_area = array_combine( $members_area, $members_area );
    	
    	// link to the custom slug from the "My Memberships" table
    	$getviewmembershipid = get_option('wshk_viewmembershipid');
    	
    	//button membership only
    	$default_actions['view']['url'] = wc_memberships_get_members_area_url( $user_membership->get_plan_id() ).$getviewmembershipid;
    	//$default_actions['view']['name'] = __( 'View test', 'my-textdomain' );
    	//$default_actions['cancel']['name'] = __('Test cancel', 'my-textdomain');
    	
    	return $default_actions;
    }
    add_filter( 'wc_memberships_members_area_my-memberships_actions', 'wshk_change_members_area_view_link', 10, 3 );
    //add_filter( 'wc_memberships_members_area_my-membership-details_actions', 'wshk_change_members_area_view_link', 10, 3 );

 
//Since v.1.1.3
$getenableviewbilling = get_option('wshk_enableviewbilling');
if ( isset($getenableviewbilling) && $getenableviewbilling =='35' && in_array( 'woocommerce-subscriptions/woocommerce-subscriptions.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ))
    {
    
    //Custom View Billing button
    function wshk_wc_memberships_add_view_subscription_action( $actions, $user_membership ) {
    
        $getviewsubscriptionid = get_option('wshk_viewsubscriptionid');
        $getviewbillingtext = get_option('wshk_viewbillingtext');
        
        //Custom text condition
        if(!empty($getviewbillingtext)) {
            $getviewbillingtextout = $getviewbillingtext;
        } else {
            
            $getviewbillingtextout = __( 'View Billing', 'woocommerce-memberships' );
        }
    
        //Custom URL and text on area and details
        $integration = wc_memberships()->get_integrations_instance()->get_subscriptions_instance();
    
        if ( $integration->is_membership_linked_to_subscription( $user_membership ) ) {
    
            $subscription = $integration->get_subscription_from_membership( $user_membership->get_id() );
            
            //Button when subscriptions is linked
            $actions['view-subscription'] = array(
                'url'  => $subscription->get_view_order_url().$getviewsubscriptionid,
                'name' => $getviewbillingtextout /*__( 'Linked Subscription', 'my-textdomain' )*/,
            );
            
            //$actions['view']['name'] = __( 'View Perks', 'my-textdomain' );
            //change view button when membership is linked with subscriptions
        }
    
        return $actions;
    
    }
        
    add_filter( 'wc_memberships_members_area_my-memberships_actions', 'wshk_wc_memberships_add_view_subscription_action', 99, 99 );
    add_filter( 'wc_memberships_members_area_my-membership-details_actions', 'wshk_wc_memberships_add_view_subscription_action', 99, 99 );

}

    //Remove cancel button
    
    function sv_edit_my_memberships_actions( $actions ) {
    	// remove the "Cancel" action for members
    	unset( $actions['cancel'] );
    	return $actions;
    }
    add_filter( 'wc_memberships_members_area_my-memberships_actions', 'sv_edit_my_memberships_actions' );
    add_filter( 'wc_memberships_members_area_my-membership-details_actions', 'sv_edit_my_memberships_actions' );


}
}
?>