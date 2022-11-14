<?php 

//WSHk account shortcodes for Elementor

if(get_option('wshk_enableorderscontrol')==''){ 
        update_option('wshk_enableorderscontrol', '140');
        }
        
        if(get_option('wshk_enablemydownloadsht')==''){ 
        update_option('wshk_enablemydownloadsht', '2000');
        }
        
        if(get_option('wshk_enablemyaddressessht')==''){ 
        update_option('wshk_enablemyaddressessht', '2001');
        }
        
        if(get_option('wshk_enablemypaymentsht')==''){ 
        update_option('wshk_enablemypaymentsht', '2002');
        }
        
        if(get_option('wshk_enablemyeditaccsht')==''){ 
        update_option('wshk_enablemyeditaccsht', '2003');
        }
        
        /*if(get_option('wshk_enabledashbsht')==''){ 
        update_option('wshk_enabledashbsht', '2004');
        }*/
        
        if(get_option('wshk_enablelogoutbtn')==''){ 
        update_option('wshk_enablelogoutbtn', '12');
        }
        
        if(get_option('wshk_enableloginform')==''){ 
        update_option('wshk_enableloginform', '13');
        }
        
        if(get_option('wshk_enablescusre')==''){ 
        update_option('wshk_enablescusre', '99');
        }
        
        
//WSHK PRO category
function create_custom_categories( $elements_manager ) {

    $elements_manager->add_category(
        'WSHK',
        [
         'title' => __( 'WSHK PRO', 'plugin-name' ),
         'icon' => 'eicon-woocommerce',
        ]
    );
}
add_action( 'elementor/elements/categories_registered', 'create_custom_categories' );


?>