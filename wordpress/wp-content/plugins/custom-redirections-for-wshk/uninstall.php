<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 *
 * This file may be updated more in future version of the Boilerplate; however, this is the
 * general skeleton and outline for how the file should work.
 *
 * For more information, see the following discussion:
 * https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/pull/123#issuecomment-28541913
 *
 * @link       https://disespubli.com
 * @since      1.0.0
 *
 * @package    Custom_Redirections_for_WSHK
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

/*Custom Blocks options*/
    	
    	delete_option('wshk_enablescusre');
    	delete_option('wshk_vieworderid');
    	delete_option('wshk_miaddressesid');
    	delete_option('wshk_mipaymentsid');
    	delete_option('wshk_viewsubscriptionid');
    	
    	
    	delete_option('wshk_enablecustomblockss');
    	
    	delete_option('wshk_enablescusrecharts');
    	
    	delete_option('wshk_tbcharttitleone');
    	delete_option('wshk_tbcharttitletwo');
    	delete_option('wshk_tbcharttitletres');
    	delete_option('wshk_tbcharttitlefour');
    	delete_option('wshk_tbcharttitlefive');
    	delete_option('wshk_tbcharttitlesix');
    	delete_option('wshk_tbcharttitleseven');
    	
    	delete_option('wshk_occharttitleone');
    	delete_option('wshk_occharttitletwo');
    	delete_option('wshk_occharttitletres');
    	delete_option('wshk_occharttitlefour');
    	delete_option('wshk_occharttitlefive');
    	delete_option('wshk_occharttitlesix');
    	delete_option('wshk_occharttitleoseven');
    	delete_option('wshk_enableelemtbdetect');
    	
    	delete_option('wshk_enablesubscription');
    	delete_option('wshk_enablesubscriptionshortcode');
    	
    	delete_option('wshk_enablecustomeravataruploader');
    	delete_option('wshk_enablecustomeravatarshortcode');
    	
    	delete_option('wshk_enablecustomblockselementor');
    	delete_option('wshk_enablewshkshortcodeselementor');
    	delete_option('wshk_enablewshkcustomelemlibrary');
    	delete_option('wshk_enablerestrictcategories');
    	
    	delete_option('wshk_enabledivitbdetect');
    	delete_option('wshk_customdivitabsmodule');
    	delete_option('wshk_customdivitextsmodule');
    	
    	delete_option('wshk_myfilesizelimit');
    	delete_option('wshk_displaycustavatartoo');
    	
    	delete_option('wshkhide_salebadge');
    	delete_option('wshk_salebadge_sht');
    	
    	delete_option('wshk_enablemembershipcompat');
    	delete_option('wshk_viewmembershipid');
    	
    	/*1.9.3*/
    	delete_option('wshk_mintextvarpro');
    	delete_option('wshk_maxtextvarpro');
    	delete_option('wshk_sufmaxtextvarpro');
    	delete_option('wshk_sufmintextvarpro');
    	delete_option('wshk_enableviewbilling');
    	delete_option('wshk_viewbillingtext');
    	delete_option('wshk_cuspurprocoundays');
    	delete_option('wshk_custotordcoundays');
    	delete_option('wshk_fakeaddprodincounter');
    	delete_option('wshk_enablewebtoffeesubsht');
    	
    	/*v.1.9.4 - v.1.1.4*/
    	delete_option('wshk_animatedcounterpro');
    	delete_option('wshk_animatedcounterord');
    	delete_option('wshk_animatedcounterrev');
    	
    	//v.1.1.9
    	delete_option('wshk_enableprototsalamocats');
    	delete_option('wshk_enableprototsalcountcats');
    	
    	
    	
    	
    	
    	
