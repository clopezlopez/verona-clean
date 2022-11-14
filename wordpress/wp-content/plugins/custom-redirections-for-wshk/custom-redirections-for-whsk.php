<?php
/**
* Plugin Name: Woo Shortcodes Kit PRO
* Plugin URI: https://disespubli.com/
* Description: Are you building your custom my account page with Woo Shortcodes Kit and need set a customs URLS for the view orders, edit addresses and payment methods endpoint to send back to the user after the click in the action button? This plugin will do it exactly, add your container ID and the button will take the new action URL. But this plugin can do much more! with the custom blocks function, you can get a new world of posibilities to made a exclusive my account page!
* Author: Alberto G.
* Version: 1.1.9
* Tested up to: 5.9
* WC requires at least: 4.0
* WC tested up to: 6.4.1
* Author URI: https://disespubli.com/
* Text Domain: wshk-custom-redirections
* Domain Path: /languages
* License: GPLv3 or later License
* URI: http://www.gnu.org/licenses/gpl-3.0.html

    Woo Shortcodes Kit PRO is not a free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    any later version. But you must pay before to get his code.
 
    Woo Shortcodes Kit PRO for WSHK is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.
 
    You should have received a copy of the GNU General Public License
    along with Woocommerce Shortcodes Kit. If not, see http://www.gnu.org/licenses/gpl-3.0.html.
  */



if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}



//Make sure Woo Shortcodes Kit is active - updated 1.1.5
    
    function woocommerce_wshkpro_missing_wc_notice() {
    	
    	echo '<div class="error"><p><strong>' . sprintf( esc_html__( 'Woo Shortcodes Kit PRO requires Woo Shortcodes Kit to be installed and active. You can download %s here.', 'wshk-custom-redirections' ), '<a href="https://wordpress.org/plugins/woo-shortcodes-kit/" target="_blank">Woo Shortcodes Kit</a>' ) . '</strong></p></div>';
    }
    
    
    add_action( 'plugins_loaded', 'woocommerce_wshkpro_init' );
    function woocommerce_wshkpro_init() {
        
        if ( !in_array( 'woo-shortcodes-kit/woo-shortcodes-kit.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
       add_action( 'admin_notices', 'woocommerce_wshkpro_missing_wc_notice' );
        	return;
        }
    }


/*Elementor*/

define( 'ELEMENTOR_CBAR', '1.1.9' );
define( 'ELEMENTOR_CBAR_FILE__', __FILE__ );
define( 'ELEMENTOR_CBAR_PLUGIN_BASE', plugin_basename( ELEMENTOR_CBAR_FILE__ ) );
define( 'ELEMENTOR_CBAR_PATH', plugin_dir_path( ELEMENTOR_CBAR_FILE__ ) );


/*Load textdomain*/
add_action( 'plugins_loaded', 'cbar_load_plugin_textdomain' );
function cbar_load_plugin_textdomain() {
	load_plugin_textdomain( 'wshk-custom-redirections' );
}


/*Hide admin notices*/
if (isset($_GET['page']) && $_GET['page'] == 'custom-redirections-for-wshk') {
function hide_notices_dashboardd_cbar() {
    global $wp_filter;
 
    if (is_network_admin() and isset($wp_filter["network_admin_notices"])) {
        unset($wp_filter['network_admin_notices']);
    } elseif(is_user_admin() and isset($wp_filter["user_admin_notices"])) {
        unset($wp_filter['user_admin_notices']);
    } else {
        if(isset($wp_filter["admin_notices"])) {
            unset($wp_filter['admin_notices']);
        }
    }
 
    if (isset($wp_filter["all_admin_notices"])) {
        unset($wp_filter['all_admin_notices']);
    }
}
add_action( 'admin_init', 'hide_notices_dashboardd_cbar' );}

//RUN IF LICENSE IS ACTIVE

    



/*function wshk_check_if_is_active() {

        if ( in_array( 'woo-shortcodes-kit/woo-shortcodes-kit.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        print '<div class="notice notice-success is-dismissible" style="padding: 20px;">Todo listo desde ya, puedes personalizar tu pagina mi cuenta facilmente con EASY MY ACCOUNT BUILDER FOR WSHK.</div>';

        } 

        else {
        echo '<div class="notice notice-error is-dismissible">WooCommerce no esta activado, debes activarlo para que este plugin funcione';
        }
} 

add_action ( 'admin_notices', 'wshk_check_if_is_active' );*/




        




require_once "CustomBlocksandRedirectionsBase.php";
class CustomBlocksandRedirections {
    public $plugin_file=__FILE__;
    public $responseObj;
    public $licenseMessage;
    public $showMessage=false;
    public $slug="custom-redirections-for-wshk";
    function __construct() {
        add_action( 'admin_print_styles', [ $this, 'SetAdminStyle' ] );
        $licenseKey=get_option("CustomBlocksandRedirections_lic_Key","");
        $liceEmail=get_option( "CustomBlocksandRedirections_lic_email","");
        CustomBlocksandRedirectionsBase::addOnDelete(function(){
           delete_option("CustomBlocksandRedirections_lic_Key");
        });
        if(CustomBlocksandRedirectionsBase::CheckWPPlugin($licenseKey,$liceEmail,$this->licenseMessage,$this->responseObj,__FILE__)){
            add_action( 'admin_menu', [$this,'ActiveAdminMenu'],99999);
            add_action( 'admin_post_CustomBlocksandRedirections_el_deactivate_license', [ $this, 'action_deactivate_license' ] );
            


        /*AUTOMATIC UPDATES*/
        
        /*back*/
        
        
        include_once ELEMENTOR_CBAR_PATH . 'functions/wshk-divi-compat.php';
        include_once ELEMENTOR_CBAR_PATH . 'functions/wshk-woosubs-compat.php';
        include_once ELEMENTOR_CBAR_PATH . 'functions/wshk-woomembership-compat.php';
        include_once ELEMENTOR_CBAR_PATH . 'functions/wshk-woo-pro-templates.php';
        include_once ELEMENTOR_CBAR_PATH . 'functions/wshk-wc.php';
        include_once ELEMENTOR_CBAR_PATH . 'functions/wshk-woocharts.php';
        include_once ELEMENTOR_CBAR_PATH . 'elementor/functions/linkeable-tabs-for-elementor.php';
        
        //Since v.1.1.2
        //Add PRO integrates for WSHK
        
        include_once ELEMENTOR_CBAR_PATH . 'functions/wshk-integrates.php';
        
        include_once ELEMENTOR_CBAR_PATH . 'functions/wshk-webtoffeesubs-compat.php';
        





//Custom Blocks for Elementor

$customblockselementor = get_option('wshk_enablecustomblockselementor');
if ( isset($customblockselementor) && $customblockselementor =='18710901')
    {
    
    //Since 1.1.0
    //CHECK IF ELEMENTOR EXISTS
    
    if ( in_array( 'elementor/elementor.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    
    include_once ELEMENTOR_CBAR_PATH . 'elementor/functions/custom-blocks-elementor.php';   
    
    }
        
    }//end
    
    
//WSHK shortcodes for Elementor

$wshkshortcodeselementor = get_option('wshk_enablewshkshortcodeselementor');
if ( isset($wshkshortcodeselementor) && $wshkshortcodeselementor =='18710902')
    {
        
        //Since 1.1.0
    //CHECK IF ELEMENTOR EXISTS
    
    if ( in_array( 'elementor/elementor.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        
        include_once ELEMENTOR_CBAR_PATH . 'elementor/functions/wshk-shortcodes-for-elementor.php';   

    //Widgets
        include_once ELEMENTOR_CBAR_PATH . 'elementor/my-widgets.php';
        
    }
    
    //Advanced tabs for Elementor
    add_action("wp_enqueue_scripts", "wshk_advtabs_js_css");

    function wshk_advtabs_js_css(){
        
        wp_register_script('wshk-adv-tabs', '/wp-content/plugins/custom-redirections-for-wshk/elementor/assets/advanced-tabs.js', array('jquery'), '1', true );
        wp_enqueue_script('wshk-adv-tabs');
        
        wp_register_style( 'wshk-adv-tabss', '/wp-content/plugins/custom-redirections-for-wshk/elementor/assets/advanced-tabs.css' );
        wp_enqueue_style( 'wshk-adv-tabss' );
        
    }
        
    }//end


//Elementor library

$wshkcustomelemlibrary = get_option('wshk_enablewshkcustomelemlibrary');
if ( isset($wshkcustomelemlibrary) && $wshkcustomelemlibrary =='18710911') 
    {
        
        //Since 1.1.0
    //CHECK IF ELEMENTOR EXISTS
    
    if ( in_array( 'elementor/elementor.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        
        include_once ELEMENTOR_CBAR_PATH . 'elementor/elementor/custom_source.php';
        
    }
    }
        
        
        /*back*/


}else{
            if(!empty($licenseKey) && !empty($this->licenseMessage)){
               $this->showMessage=true;
            }
            update_option("CustomBlocksandRedirections_lic_Key","") || add_option("CustomBlocksandRedirections_lic_Key","");
            add_action( 'admin_post_CustomBlocksandRedirections_el_activate_license', [ $this, 'action_activate_license' ] );
            add_action( 'admin_menu', [$this,'InactiveMenu']);
        }
    }
    function SetAdminStyle() {
        wp_register_style( "CustomBlocksandRedirectionsLic", plugins_url("_lic_style.css",$this->plugin_file),10);
        wp_enqueue_style( "CustomBlocksandRedirectionsLic" );
    }
    function ActiveAdminMenu(){
        
		add_menu_page (  "WSHK PRO license", "WSHK PRO", "activate_plugins", $this->slug, [$this,"Activated"], " dashicons-admin-network ");
		//add_submenu_page(  $this->slug, "CustomBlocksandRedirections License", "License Info", "activate_plugins",  $this->slug."_license", [$this,"Activated"] );

    }
    function InactiveMenu() {
        add_menu_page( "CustomBlocksandRedirections", "WSHK PRO", 'activate_plugins', $this->slug,  [$this,"LicenseForm"], " dashicons-admin-network " );

    }
    function action_activate_license(){
            check_admin_referer( 'el-license' );
            $licenseKey=!empty($_POST['el_license_key'])?$_POST['el_license_key']:"";
            $licenseEmail=!empty($_POST['el_license_email'])?$_POST['el_license_email']:"";
            update_option("CustomBlocksandRedirections_lic_Key",$licenseKey) || add_option("CustomBlocksandRedirections_lic_Key",$licenseKey);
            update_option("CustomBlocksandRedirections_lic_email",$licenseEmail) || add_option("CustomBlocksandRedirections_lic_email",$licenseEmail);
            wp_safe_redirect(admin_url( 'admin.php?page='.$this->slug));
        }
    function action_deactivate_license() {
        check_admin_referer( 'el-license' );
        $message="";
        if(CustomBlocksandRedirectionsBase::RemoveLicenseKey(__FILE__,$message)){
            update_option("CustomBlocksandRedirections_lic_Key","") || add_option("CustomBlocksandRedirections_lic_Key","");
        }
        wp_safe_redirect(admin_url( 'admin.php?page='.$this->slug));
    }
    function Activated(){
        ?>
        <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
            <input type="hidden" name="action" value="CustomBlocksandRedirections_el_deactivate_license"/>
            <div class="el-license-container">
                <h3 class="el-license-title"><i class="dashicons-before dashicons-admin-network"></i> <?php _e('Woo Shortcodes Kit PRO License Info','wshk-custom-redirections');?> </h3>
                <hr>
                <ul class="el-license-info">
                <li>
                    <div>
                        <span class="el-license-info-title"><?php _e('Status','wshk-custom-redirections');?></span>

                        <?php if ( $this->responseObj->is_valid ) : ?>
                            <span class="el-license-valid"><?php _e('Active','wshk-custom-redirections');?></span>
                        <?php else : ?>
                            <span class="el-license-valid"><?php _e('Invalid','wshk-custom-redirections');?></span>
                        <?php endif; ?>
                    </div>
                </li>

                <li>
                    <div>
                        <span class="el-license-info-title"><?php _e('License Type','wshk-custom-redirections');?></span>
                        <?php echo $this->responseObj->license_title; ?>
                    </div>
                </li>

                <li>
                    <div>
                        <span class="el-license-info-title"><?php _e('License Expired on','wshk-custom-redirections');?></span>
                        <?php echo $this->responseObj->expire_date; ?>
                    </div>
                </li>

                <li>
                    <div>
                        <span class="el-license-info-title"><?php _e('Support Expired on','wshk-custom-redirections');?></span>
                        <?php echo $this->responseObj->support_end; ?>
                    </div>
                </li>
                    <li>
                        <div>
                            <span class="el-license-info-title"><?php _e('Your License Key','wshk-custom-redirections');?></span>
                            <span class="el-license-key"><?php echo esc_attr( substr($this->responseObj->license_key,0,9)."XXXXXXXX-XXXXXXXX".substr($this->responseObj->license_key,-9) ); ?></span>
                        </div>
                    </li>
                </ul>
                <div class="el-license-active-btn">
                    <?php wp_nonce_field( 'el-license' ); ?>
                    <?php submit_button(__('Deactivate','wshk-custom-redirections' )); ?>
                </div>
            </div>
        </form>
    <?php
    $siteurlemab = get_site_url();
    ?>
    <a onclick="location.href='<?php echo $siteurlemab; ?>/wp-admin/admin.php?page=woo-shortcodes-kit';" style="cursor:pointer;padding:30px;"><?php esc_html_e( 'Back to WSHK settings panel', 'wshk-custom-redirections' ); ?></a>
    <?php
    }

    function LicenseForm() {
        ?>
    <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
        <input type="hidden" name="action" value="CustomBlocksandRedirections_el_activate_license"/>
        <div class="el-license-container">
            <h3 class="el-license-title"><i class="dashicons-before dashicons-admin-network"></i> <?php _e('Woo Shortcodes Kit PRO Licensing','wshk-custom-redirections');?></h3>
            <hr>
            <?php
            if(!empty($this->showMessage) && !empty($this->licenseMessage)){
                ?>
                <div class="notice notice-error is-dismissible">
                    <p><?php echo _e('Invalid license code','wshk-custom-redirections'); ?></p>
                </div>
                <?php
            }
            ?>
            <p><?php _e('Enter your license key here, to activate the product, and get full feature updates and premium support.','wshk-custom-redirections');?></p>
<ol>
    <li><?php _e('Get the license key from the Orders & Keys panel in','wshk-custom-redirections');?> <a href="https://disespubli.com/user-zone/#tab4" target ="_blank"><?php _e('your account page','wshk-custom-redirections' );?></a></li>
    <li><?php _e('Write your license key and your account email','wshk-custom-redirections');?></li>
    <li><?php _e('Activate the license and back to the WSHK settings panel to enjoy with your new addon!','wshk-custom-redirections');?></li>
    <!--<li>. ...</li>-->
</ol>
            <div class="el-license-field">
                <label for="el_license_key"><?php _e('License code','wshk-custom-redirections');?></label>
                <input type="text" class="regular-text code" name="el_license_key" size="50" placeholder="xxxxxxxx-xxxxxxxx-xxxxxxxx-xxxxxxxx" required="required">
            </div>
            <div class="el-license-field">
                <label for="el_license_key"><?php _e('Email Address','wshk-custom-redirections');?></label>
                <?php
                    $purchaseEmail   = get_option( "CustomBlocksandRedirections_lic_email", get_bloginfo( 'admin_email' ));
                ?>
                <input type="text" class="regular-text code" name="el_license_email" size="50" value="<?php echo $purchaseEmail; ?>" placeholder="" required="required">
                <!--<div><small><?php _e("We will send update news of this product by this email address, don't worry, we hate spam",$this->slug);?></small></div>-->
            </div>
            <div class="el-license-active-btn">
                <?php wp_nonce_field( 'el-license' ); ?>
                <?php submit_button(__('Activate','wshk-custom-redirections' )); ?>
            </div>
        </div>
    </form>
    <?php
    $siteurlemab = get_site_url();
    ?>
    <a onclick="location.href='<?php echo $siteurlemab; ?>/wp-admin/admin.php?page=woo-shortcodes-kit';" style="cursor:pointer;padding:30px;"><?php esc_html_e( 'Back to WSHK settings panel', 'wshk-custom-redirections' ); ?></a>
        <?php
    }
}

new CustomBlocksandRedirections();