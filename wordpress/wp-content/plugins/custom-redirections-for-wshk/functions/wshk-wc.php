<?php 


//Since v.1.0.4

$checkboxcheckerwshk = get_option('wshk_enablecustomblockss');
if ( isset($checkboxcheckerwshk) && $checkboxcheckerwshk == '97')
    {
        
function custom_blocks_pro() {
    //$vaone ='one';
    if ( ! is_user_logged_in()){
        
    $varitestwshk = '
    
   
    <script>
    if ( document.getElementById("wshklogged") !== null ) { 
        document.getElementById("wshklogged").remove();}
        </script>
        <script>
    if ( document.getElementById("wshkloggedone") !== null ) { 
        document.getElementById("wshkloggedone").remove();}
        </script>
        <script>
    if ( document.getElementById("wshkloggedtwo") !== null ) { 
        document.getElementById("wshkloggedtwo").remove();}
        </script>
        <script>
    if ( document.getElementById("wshkloggedthree") !== null ) { 
        document.getElementById("wshkloggedthree").remove();}
        </script>
        <script>
    if ( document.getElementById("wshkloggedfour") !== null ) { 
        document.getElementById("wshkloggedfour").remove();}
        </script>    
        
        ';
    } else {
        
        $varitestwshk = '
    
    <script>
    if ( document.getElementById("wshknonlogged") !== null ) { 
        document.getElementById("wshknonlogged").remove();}
        </script>
        <script>
    if ( document.getElementById("wshknonloggedone") !== null ) { 
        document.getElementById("wshknonloggedone").remove();}
        </script>
        <script>
    if ( document.getElementById("wshknonloggedtwo") !== null ) { 
        document.getElementById("wshknonloggedtwo").remove();}
        </script>
        <script>
    if ( document.getElementById("wshknonloggedthree") !== null ) { 
        document.getElementById("wshknonloggedthree").remove();}
        </script>
        <script>
    if ( document.getElementById("wshknonloggedfour") !== null ) { 
        document.getElementById("wshknonloggedfour").remove();}
        </script>    
        
        ';
        
    }
    return $varitestwshk;
}
add_shortcode('enable_custom_blocks', 'custom_blocks_pro');
}





/*Since v.1.0.3 - Updated v.1.1.0*/

// CUSTOMER AVATAR UPLOADER
/*Add an image uploader in the edit account form, the customer can upload an image and it will be the profile avatar. The images will be saved in the wp-content/uploads folder*/


$customavataruploader = get_option('wshk_enablecustomeravataruploader');
if ( isset($customavataruploader) && $customavataruploader == '18610301')
    {
     
     add_action('woocommerce_edit_account_form_tag',function(){
	echo ' enctype="multipart/form-data"';
});

add_action('woocommerce_edit_account_form_start',function(){

    $user = wp_get_current_user();
    $current_user = $user->ID;
    $newavatar = get_user_meta($current_user, 'avatar', true);
    $alsoavatar = get_option('wshk_displaycustavatartoo');
    if($newavatar){
        ?>
       <style>
           p.shtavatarwshk {
               display:<?php echo $alsoavatar ?>;
           }
       </style>
        <?php
        
    }else{
        echo '<p class="woocommerce-form-row wshkdefavatar">'.get_avatar( $current_user, 160 ).'</p>';
?>
<style>
    
.wshkavatar {


width:160px;
margin:auto;
}

.wshkavatar > img.avatar {
  width:160px;  
}

p.wshkuploader {
    /*background:white;*/
    /*padding:20px;*/
    
}

p.wshkdefavatar {
    
    text-align:center;
}

p.shtavatarwshk {
    
    display:<?php echo $alsoavatar ?>;
}
    
</style>

	<p class="form-row wshkuploader" id="wshkuplo" style="text-align: center;padding-bottom: 40px;margin-bottom: 30px;"><label for="photo"><?php esc_html_e( 'Upload you custom avatar (JPG, PNG)', 'wshk-custom-redirections' ); ?></label><br><input type="file" id="photo" name="photo" accept="image/*,.jpg,.png" /></p>
	<?php
}
});

add_action('woocommerce_save_account_details',function( $user_id ){
	
	if ( ! function_exists( 'wp_handle_upload' ) ) {
	    require_once( ABSPATH . 'wp-admin/includes/file.php' );
	}
	
	$uploadedfile = $_FILES['photo'];
	
	//Check file type
	$wp_filetype = wp_check_filetype_and_ext($uploadedfile['tmp_name'], $uploadedfile['name'], false);
	
	if(!empty($uploadedfile['name'])){
	    
	    
	    //Check file type
         if (!in_array($wp_filetype['ext'] ,['png','jpg'])&& !wp_match_mime_types('image/', $wp_filetype['type'])) {
            
            
            wp_die(__('You must upload an <b>image (.JPG or .PNG)</b>, please go back and try again.', 'wshk-custom-redirections'), '', array('back_link' => true));
        }
        //Check file size
        
        $wshkfilelimits = get_option('wshk_myfilesizelimit');
        if($wshkfilelimits){
        if($wshkfilelimits == '1') { $thelimit = '100000';}
        else if($wshkfilelimits == '2') { $thelimit = '200000';}
        else if($wshkfilelimits == '3') { $thelimit = '1000000';}
        } else { $thelimit = '200000';}
        
        if($_FILES['photo']['size'] > $thelimit){
            
            if($wshkfilelimits){
        if($wshkfilelimits == '1') { wp_die(__('File too large, must be less than <b>100 KB</b>', 'wshk-custom-redirections'), '', array('back_link' => true));}
        else if($wshkfilelimits == '2') { wp_die(__('File too large, must be less than <b>200 KB</b>', 'wshk-custom-redirections'), '', array('back_link' => true));}
        else if($wshkfilelimits == '3') { wp_die(__('File too large, must be less than <b>1 MB</b>', 'wshk-custom-redirections'), '', array('back_link' => true));}
        } else { wp_die(__('File too large, must be less than <b>200 KB</b>', 'wshk-custom-redirections'), '', array('back_link' => true));}
	        
	    }
        
        
	}
	
	//Upload file
	$movefile = wp_handle_upload( $uploadedfile, array('test_form' => FALSE) );
	
	if ( $movefile && !isset( $movefile['error'] ) ) {
	    
	  update_user_meta($user_id, 'avatar', $movefile['url']) 
	  or add_user_meta($user_id, 'avatar', $movefile['url']);
	  
	} else {
	    
	    echo $movefile['error'];
	    
	}
});



function wshk_custom_avatar($avatar_html, $id_or_email, $size, $default='', $alt, $args) {
    
    global $pagenow;
    
    if (is_numeric($id_or_email)) {
        
        $user_id = (int) $id_or_email;
        $avatar = get_user_meta($user_id,'avatar',true);
        
    } elseif (is_string($id_or_email)) {
        
        if ($user = get_user_by_email($id_or_email))
            $user_id = $user->ID;
            $avatar = get_user_meta($user_id,'avatar',true);
            
    } elseif (is_object($id_or_email) && !empty($id_or_email->user_id)) {
        
        $user_id = (int) $id_or_email->user_id;
        $avatar = get_user_meta($user_id,'avatar',true);
        
    } else {
        
        $user_id = (int) $id_or_email->user_id;
        $avatar = get_user_meta($user_id,'avatar',true);
    }
    
    
	$avatar = get_user_meta($user_id,'avatar',true);
	//$theuserid = $id_or_email->user_id;
	//$theuserid = get_current_user_id();
    //$newavatar = get_user_meta($theuserid, 'avatar',true);
    
	
	if( $avatar ) {
	    
	    if(! is_admin()){
	        
		return '<img src="'.$avatar.'" width="50" height="auto" alt="Avatar" class="avatar avatar-50 photo wshkavatar"  />';
	        
	    } else if ($pagenow == 'user-edit.php'){
		  
		  return '<img src="'.$avatar.'" width="96" height="auto" alt="Avatar" class="avatar avatar-96 photo wshkavatar"  />';
		    
		} else {
		   
	        return '<img src="'.$avatar.'" width="32" height="auto" alt="Avatar" class="avatar avatar-32 photo wshkavatar"  />';
	    }
		
		
	} /*else if($newavatar) {
		
		if(! is_admin()){
		    
		  return '<img src="'.$newavatar.'" width="50" height="auto" alt="Avatar" class="avatar avatar-50 photo wshkavatar"  />';
		    
		} else if ($pagenow == 'user-edit.php'){
		  
		  return '<img src="'.$newavatar.'" width="96" height="auto" alt="Avatar" class="avatar avatar-96 photo wshkavatar"  />';
		    
		} else {
		    
		    return '<img src="'.$newavatar.'" width="32" height="auto" alt="Avatar" class="avatar avatar-32 photo wshkavatar"  />';
		}
		
	}*/ else {
	    
	    return $avatar_html;
	}

}
add_filter('get_avatar', 'wshk_custom_avatar', 10, 6);

 

function wshk_delete_uavatarbtn(){
    $user = wp_get_current_user();
    $current_user = $user->ID;
    $newavatar = get_user_meta($current_user, 'avatar', true);
    
    $parsingwshk = parse_url($newavatar);
    $currentavaturl = $parsingwshk['path'];
    $removeitpls = '.'.$currentavaturl;
    
    
    if (isset($_POST['deleting'])) {
    ?>
    <style>
        .wshkdefavatar {display:none;}
        input.deletingbtn.button {display:none;}
    </style>
    <script>
    if ( document.getElementById("wshkuplo") !== null ) { 
        document.getElementById("wshkuplo").remove();}
        </script>
    <?php
    delete_user_meta($current_user, 'avatar', $newavatar);
    
        if(file_exists($removeitpls)){ 
        unlink($removeitpls);
        
        }
    
    echo "<meta http-equiv='refresh' content='0'>";
    }
    
    if($newavatar){
        
        
        echo '<p class="woocommerce-form-row wshkdefavatar">'.get_avatar( $current_user, 160 ).'</p>';
        
    ?>
    <style>
        
    .wshkavatar {
        width:160px;
        margin:auto;
    }

    p.wshkdefavatar {
    
        text-align:center;
    }
        
    </style>
    <script>
    if ( document.getElementById("wshkuplo") !== null ) { 
        document.getElementById("wshkuplo").remove();}
        </script>
    
    <form action="" method="POST" style="text-align:center;margin-bottom:40px;margin-top:-20px;">
    <input type="submit" name="deleting" class="deletingbtn button" value="<?php esc_html_e( 'Remove Avatar', 'wshk-custom-redirections' ); ?>">
      </form>
      
    
    <?php
    }
}

add_action('woocommerce_before_edit_account_form', 'wshk_delete_uavatarbtn');   
     
        
    }//end
    
    
    /*Since v.1.0.3*/

// CUSTOMER AVATAR SHORTCODE
/*Add the customer avatar where you need with just a shortcode. Use the shortcode [woo_customer_avatar]*/


$customavataruploader = get_option('wshk_enablecustomeravatarshortcode');
if ( isset($customavataruploader) && $customavataruploader == '18610302')
    {
        
        function wshk_custom_avatar_sht() {
    	if(is_user_logged_in()){
        	global $current_user;
               wp_get_current_user(); 
        	    ob_start();
        	    ?>
        	    <style>
    
.wshkavatar {


width:160px;
margin:auto;
}

.wshkavatar > img.avatar {
  width:160px;  
}

p.wshkuploader {
    /*background:white;*/
    /*padding:20px;*/
    
}

p.wshkdefavatar {
    
    text-align:center;
}

p.shtavatarwshk {
    
    text-align:center;
    /*width:160px;
margin:auto;*/
}
    
</style>
        	    <?php
               echo '<p class="shtavatarwshk" id="shtavatarwshk">'.get_avatar( $current_user->ID, 160 ).'</p>';
        	    return ob_get_clean();
        }
        }
    
        add_shortcode('woo_customer_avatar', 'wshk_custom_avatar_sht');
    } //end
    
    
    



//Since 1.0.9
//Restrict access to product category pages with redirection to shop page or custom shop page. Compatible with WSHK custom shop page.

$wshkrestrictcats = get_option('wshk_enablerestrictcategories');
if ( isset($wshkrestrictcats) && $wshkrestrictcats == '18710905')
    {


add_action( 'template_redirect', 'wshk_wc_redirect_to_customshop');
function wshk_wc_redirect_to_customshop() {
    // Only on product category archive pages (redirect to shop)
    if ( is_product_category() ) {
        wp_redirect( esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ));
        exit();
    } 
}

}

//Since v.1.1.9
//TOTAL SALES AMOUNT BY PRODUCT CATEGORY ID
//Display the total sales amount by product category using just a shortcode.

$wshktotsalamocats = get_option('wshk_enableprototsalamocats');
if ( isset($wshktotsalamocats) && $wshktotsalamocats == '110420220')
    {

function wshk_total_sales_amount_byproducts_cats($atts) {
	
	// GET CATEGORY ID FROM SHORTCODE
       $atts = shortcode_atts( array(
            'id' => '0'
        ), $atts );


    include_once(WC()->plugin_path().'/includes/admin/reports/class-wc-admin-report.php');
    $wc_report = new WC_Admin_Report();

    $data = $wc_report->get_order_report_data( array(
        'data' => array(
            '_qty' => array(
                'type' => 'order_item_meta',
                'order_item_type' => 'line_item',
                'function' => 'SUM',
                'name' => 'quantity'
            ),
            '_line_total' => array(
                'type' => 'order_item_meta',
                'order_item_type' => 'line_item',
                'function' => 'SUM',
                'name' => 'gross'
            ),
            '_product_id' => array(
                'type' => 'order_item_meta',
                'order_item_type' => 'line_item',
                'function' => '',
                'name' => 'product_id'
            ),
            'order_item_name' => array(
                'type'     => 'order_item',
                'function' => '',
                'name'     => 'order_item_name',
            ),
        ),
			

        'group_by'     => 'product_id',

        'order_by'     => 'quantity DESC',

        'query_type' => 'get_results',

        /*'limit' => 20,*/

        'order_status' => array( 'completed', 'processing', 'on-hold' ),
    ) );

    
	$sum = 0;
	$wshk_catid = $atts['id'];
	foreach ($data as $values){
		
		$terms = get_the_terms($values->product_id, 'product_cat');
			
		foreach ($terms as $term) {
				
			if($term->term_id == $wshk_catid){			
				$totamount = $values->gross;			
				$sum+=$totamount;			
			}
				
          }
		
	}
	
	return $sum;
	
}
add_shortcode('woo_total_amount_bycat', 'wshk_total_sales_amount_byproducts_cats');
}



//Since v.1.1.9
//TOTAL SALES COUNTER BY PRODUCT CATEGORY ID
//Display the total sales count by product category using just a shortcode.

$wshktotsalcountcats = get_option('wshk_enableprototsalcountcats');
if ( isset($wshktotsalcountcats) && $wshktotsalcountcats == '130420220')
    {


function wshk_total_sales_counter_byproducts_cats($atts) {

	// GET CATEGORY ID FROM SHORTCODE
       $atts = shortcode_atts( array(
            'id' => '0'
        ), $atts );


    include_once(WC()->plugin_path().'/includes/admin/reports/class-wc-admin-report.php');
    $wc_report = new WC_Admin_Report();

    $data = $wc_report->get_order_report_data( array(
        'data' => array(
            '_qty' => array(
                'type' => 'order_item_meta',
                'order_item_type' => 'line_item',
                'function' => 'SUM',
                'name' => 'quantity'
            ),
            '_line_total' => array(
                'type' => 'order_item_meta',
                'order_item_type' => 'line_item',
                'function' => 'SUM',
                'name' => 'gross'
            ),
            '_product_id' => array(
                'type' => 'order_item_meta',
                'order_item_type' => 'line_item',
                'function' => '',
                'name' => 'product_id'
            ),
            'order_item_name' => array(
                'type'     => 'order_item',
                'function' => '',
                'name'     => 'order_item_name',
            ),
        ),
			

        'group_by'     => 'product_id',

        'order_by'     => 'quantity DESC',

        'query_type' => 'get_results',

        /*'limit' => 20,*/

        'order_status' => array( 'completed', 'processing', 'on-hold' ),
    ) );

    
	$sum = 0;
	$wshk_catid = $atts['id'];
	
	foreach ($data as $values){
		
		$terms = get_the_terms($values->product_id, 'product_cat');
			
		foreach ($terms as $term) {
				
			if($term->term_id == $wshk_catid){			
				$totamount = $values->quantity;			
				$sum+=$totamount;				
			}
				
          }
		
	}
	
	return $sum;
	
	
}

add_shortcode('woo_total_sales_bycat_counter', 'wshk_total_sales_counter_byproducts_cats');
}

?>