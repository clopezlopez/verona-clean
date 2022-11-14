<?php

require_once "CustomBlocksandRedirectionsBase.php";


    $licenseCode=get_option("CustomBlocksandRedirections_lic_Key","");//any option name, by which name have saved the license code into option table
    $licenseEmail=get_option( "CustomBlocksandRedirections_lic_email","");//any option name, by which name have saved the license email into option table
    CustomBlocksandRedirectionsBase::addOnDelete(function(){
       delete_option("CustomBlocksandRedirections_lic_Key");
    });
    //last parameter __FILE__ must be your plugin base file
	if(CustomBlocksandRedirectionsBase::CheckWPPlugin($licenseCode,$licenseEmail,$error,$responseObj,__FILE__)){

?>

<style>

    .accordion.elem {
        position: relative;
        overflow:hidden;
        background-color:#9b71d2;
    }

    .accordion.elem > table {
        padding:20px;
    }

    .accordion.elem.active, p.accordion.elem:hover {
        background-color: #9b71d2;
        opacity: 0.5;
    }

    .accordion.elem.active:after {
        color: #ffffff !important;
    }

    .compatribbon {
        text-align:center;
        min-width:160px;
        opacity:0.8;
        padding:5px;
        float:right;
        margin-top: -59px;
        box-shadow: 11px 11px 10px 0px rgba(0, 0, 0, 0.12);
        transform: rotate(45deg);
        margin-right: -76px;
        letter-spacing:1px;
    }

    .compatribbon.elementor {
        background-image: -webkit-linear-gradient(120deg,#3b2c73 0%,#ea345e 100%);
    }

    .compatribbon.subs {
        background-image: -webkit-linear-gradient(120deg,#96588a 0%,#b784ad 100%);
        padding-left: 20px;
    }

    .compatribbon.memb {
        background-image: -webkit-linear-gradient(120deg,#96588a 0%,#b784ad 100%);
        padding-left: 20px;
    }

    .compatribbon.divi {
        background-image: -webkit-linear-gradient(120deg,#812bea 0%,#b142ec 100%);
    }

    .compatribbon.webtoffee {
        background-image: -webkit-linear-gradient(120deg,#021c53 0%,#010b21 100%);
    }

    .wshkproset:before {
        display:none;
    }

</style>
    
    <!-- COMPATIBILITY SECTION -->
    
    <li>
     
       <div class="acc_ctrl wshkproset" style="background-color: #fbfbfb; padding: 10px;">
           
           <h3 class="wshksettitles"><span class="dashicons dashicons-plugins-checked"></span> <?php esc_html_e( 'COMPATIBILITY WITH THIRD PARTY PLUGINS', 'wshk-custom-redirections' ); ?>
           </h3>
           
            <p class="wshksettext"><?php esc_html_e( 'Find in this section all the shortcodes and functions to enhance the compatibility with third-party plugins', 'wshk-custom-redirections' ); ?>            
            </p>       
            <img src="<?php echo  plugins_url( 'images/logowshkpro-150x150.png' , __FILE__ );?>" style="width: 64px;height: 64px;display: block;float: right;margin-top: -75px;padding-right:15px;" ;>
            
        </div>
        
        
        <div class="acc_panel">
        <br /><br />
        
            <div class="accordion elem">
                <table>
                    <colgroup><col span="2"></colgroup>
                        <tr>
                            <th>
                                <p><input type="checkbox" class="testininputclass" id="wshk_enableelemtbdetect" name="wshk_enableelemtbdetect" value='3001' <?php if(get_option('wshk_enableelemtbdetect')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enableelemtbdetect></label><br /></th><th class="forcontainertitles" style="width:100%;padding: 20px 20px 0px 20px;"><big><?php esc_html_e( 'Elementor tabs linkeables', 'wshk-custom-redirections' ); ?></big><br /><small> <?php esc_html_e( 'Just need activate it if you are using the Elementor tabs and want them to be linkeable!', 'wshk-custom-redirections' ); ?></small>
                                </p>
                            </th>
                            <th class="hideribopro"><span class="compatribbon elementor">ELEMENTOR</span>
                            </th>
                        </tr>
                </table>
            </div>
            
            <div class="panel">
            <br /><br />
            
                <div style="width:96%;margin-top: 0px; margin-bottom: 15px;"><table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/elementor-builder-compatibility/" target="_blank" style="color: grey;"><span class="dashicons dashicons-format-video"></span> <?php esc_html_e( 'How work? ', 'wshk-custom-redirections' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/user-zone/#tab5" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'wshk-custom-redirections' ); ?></a></td></tr></table></div>
            
            <br><br>

            <p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'The shortcode', 'wshk-custom-redirections' ); ?></b><br><small><?php esc_html_e( 'You can use it on any page or post. ', 'wshk-custom-redirections' ); ?></small>
            </p>
            
            <br><br><br>
            <div onmousedown="return false;" onselectstart="return false;" class="wshkshtboxes">
                
                <table style="margin-top:-20px;"><colgroup><col span="3"></colgroup>
                    <tr>
                        <td class="shtboxone" style="width: 25%; padding-left: 30px;"><p><big><strong><span class="dashicons dashicons-code-standards"></span> <?php esc_html_e( 'Shortcode:', 'woo-shortcodes-kit' ); ?></strong><br><input class="testininputclass" onmousedown="return false;" onselectstart="return false;" style="color:white;margin-top:10px;outline:0;-moz-outline: 0;border:none;" type="text" value="[wshk-detect-elem-tabs]" id="wshkelemtabslink" readonly></big><br /><br /></p>
                        </td>
        
                        <td class="shtboxtwo" style="width: 23%; padding-left: 30px;">
                            <p><big>

                            <div class="tooltip" style="width:120px;">
                                <button class="wshkshtboxesbtn" style="width:150px;" type="button" onclick="myFunctionwshkelemtabslink()" onmouseout="outFunwshkelemtabslink()">
                                  <span class="tooltiptext" id="myTooltipwshkelemtabslink"><?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?></span>
                                  <?php esc_html_e( 'Copy shortcode', 'woo-shortcodes-kit' ); ?>
                                  </button>
                            </div>



                            <script>
                            
                            document.getElementById("wshkelemtabslink").addEventListener("mousedown", function(event){
                              event.preventDefault();
                            });
                            
                            function myFunctionwshkelemtabslink() {
                              var copyText = document.getElementById("wshkelemtabslink");
                              copyText.select();
                              document.execCommand("copy");
                              
                              var wshkelemtabslink = document.getElementById("myTooltipwshkelemtabslink");
                              wshkelemtabslink.innerHTML = "<?php esc_html_e( 'Copied:', 'woo-shortcodes-kit' ); ?> " + copyText.value;
                            }
                            
                            function outFunwshkelemtabslink() {
                              var wshkelemtabslink = document.getElementById("myTooltipwshkelemtabslink");
                              wshkelemtabslink.innerHTML = "<?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?>";
                            }
                            </script>
                            </big><br /><br /></p>
                        </td>
        
                        <td class="shtboxthree" style="width: 46%; padding-left: 30px;"><p><span class="dashicons dashicons-warning"></span><big style="font-size:14px !important;"><strong><?php esc_html_e( 'Copy the shortcode and paste in your custom page', 'woo-shortcodes-kit' ); ?></strong></big><br /><br /></p>
                        </td>
                    </tr>
                    <br /><br />
                </table>
            </div>
            
            <br><br><br>
            
            <p style="width:85%;background-color:#f4f1ff;color:#a46497;padding:30px;text-align:left;"><big><span class="dashicons dashicons-warning"></span> <?php esc_html_e( 'By default, Elementor tabs do not have the ability to link... if you are creating a custom account page with these tabs and you want to make them linkable, you only need to enable this function and add the shortcode on the same page that uses the tabs.', 'wshk-custom-redirections' ); ?><br><br><span class="dashicons dashicons-warning"></span> <?php esc_html_e( 'You will get each tab to have an identifier to be able to link to it directly without having to click on the same tab. ', 'wshk-custom-redirections' ); ?><br><?php esc_html_e( 'For example if you have 3 tabs created the link to each of them will be:', 'wshk-custom-redirections' ); ?><br><br>/#tab1<br>/#tab2<br>/#tab3<br><br><?php esc_html_e( 'If the link you want to do from another page, add in the url of the button the link to the page and at the end add /#tab2 to redirect to the tab number two. For example:', 'wshk-custom-redirections' ); ?> mywebsite.com/page-with-elementor-tabs/#tab2</big>
            </p>
            
            <br /><br /><br />
            
    </div>
    
    
    <!-- END ELEMENTOR TABS DETECTOR -->
    
    
    <div class="accordion elem">
        <table>
            <colgroup><col span="2"></colgroup>
            
            <tr>
                <th>
                    <p><input type="checkbox" class="testininputclass" id="wshk_enablewshkshortcodeselementor" name="wshk_enablewshkshortcodeselementor" value='18710902' <?php if(get_option('wshk_enablewshkshortcodeselementor')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablewshkshortcodeselementor></label><br /></th><th class="forcontainertitles" style="width:100%;padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'WSHK account shortcodes & Advanced tabs - widgets for Elementor', 'wshk-custom-redirections' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'UPDATED', 'woo-shortcodes-kit' ); ?></span>--></big><br /><small> <?php esc_html_e( 'Add the account shortcodes from Elementor builder with drag and drop!', 'wshk-custom-redirections' ); ?></small>
                    </p>
                </th>
                <th class="hideribopro"><span class="compatribbon elementor">ELEMENTOR</span>
                </th>
            </tr>
        </table>
    </div>
    
    <div class="panel">
        
        <div style="width:96%;margin-top: 20px; margin-bottom: 15px;">
            <table style="float:right;">
                <tr>
                    <td><a class="miraqueben" href="https://disespubli.com/docs/wshk-shortcodes-for-elementor/" target="_blank" style="color: grey;"><span class="dashicons dashicons-format-video"></span> <?php esc_html_e( 'How work? ', 'wshk-custom-redirections' ); ?> </a>
                    </td>
                    <td><a class="miraqueben" href="https://disespubli.com/user-zone/#tab5" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'wshk-custom-redirections' ); ?></a>
                    </td>
                </tr>
            </table>
        </div>
        
        <br><br><br><br>
        
        
        <table width="100%">
            <tr>
                <td class="forsmalldropdowns" style="width:34%;padding:20px;">
                <p style="text-align:center;"><big><span style="font-size:36px;" class="dashicons dashicons-pressthis"></span><br><br><?php esc_html_e( 'Activating this function, you can use the WSHK shortcodes and configure the options directly from Elementor builder to build your custom account page.', 'wshk-custom-redirections' ); ?></big></p>    
                </td>
                <td class="forsmalldropdowns" style="width:33%;padding:20px;">
                  <p style="text-align:center;"><big><span style="font-size:36px;" class="dashicons dashicons-admin-settings"></span><br><br><?php esc_html_e( 'All the shortcodes will be enabled automatically on the WSHK settings panel and will follow activated while you keep enabled this function. ', 'wshk-custom-redirections' ); ?></big>
                </td>
                <td class="forsmalldropdowns" style="width:33%;padding:20px;">
                   <p style="text-align:center;"><big><span style="font-size:36px;" class="dashicons dashicons-info"></span><br><br><?php esc_html_e( 'If you have set any shortcode option from Elementor and want edit from the WSHK settings panel, leave blank the option from Elementor first.', 'wshk-custom-redirections' ); ?></big> 
                </td>
            </tr>
        </table>

        <br><br><br>
        
        <p><?php esc_html_e( 'The following functions will be activated automatically:', 'wshk-custom-redirections' ); ?>
        </p>

        <br>
        
        <table style="width:100%">
            <tr>
                <th><?php esc_html_e( 'Function', 'wshk-custom-redirections' ); ?>
                </th>
                <th class="wshkhidefuncol"><?php esc_html_e( 'Section', 'wshk-custom-redirections' ); ?>
                </th>
                <th><?php esc_html_e( 'Status', 'wshk-custom-redirections' ); ?>
                </th>
            </tr>
            <tr>
                <td>
                    <p><?php esc_html_e( 'Orders list shortcode', 'woo-shortcodes-kit' ); ?></p>
                    <p><?php esc_html_e( 'Downloads list shortcod', 'woo-shortcodes-kit' ); ?>e</p>
                    <p><?php esc_html_e( 'Billing and shipping addresses shortcode', 'woo-shortcodes-kit' ); ?></p>
                    <p><?php esc_html_e( 'Payment methods shortcode', 'woo-shortcodes-kit' ); ?></p>
                    <p><?php esc_html_e( 'Edit account shortcode', 'woo-shortcodes-kit' ); ?></p>
                    <!--<p><?php esc_html_e( 'Dashboard shortcode', 'woo-shortcodes-kit' ); ?></p>-->
                    <p><?php esc_html_e( 'Logout button shortcode', 'woo-shortcodes-kit' ); ?></p>
                    <p><?php esc_html_e( 'Login form shortcode', 'woo-shortcodes-kit' ); ?></p>
                    <p><?php esc_html_e( 'Custom redirections for advanced actions of WooCommerce my account', 'wshk-custom-redirections' ); ?></p>
                    <p><?php esc_html_e( 'Advanced tabs for Elementor (built directly into WSHK shortcodes for Elementor)', 'wshk-custom-redirections' ); ?> <small style="color:#aadb4a;">(<?php esc_html_e( 'NEW', 'woo-shortcodes-kit' ); ?>)</small></p>
                </td>
                <td class="wshkhidefuncol">
                    <p><?php esc_html_e( 'Account page', 'wshk-custom-redirections' ); ?></p>
                    <p><?php esc_html_e( 'Account page', 'wshk-custom-redirections' ); ?></p>
                    <p><?php esc_html_e( 'Account page', 'wshk-custom-redirections' ); ?></p>
                    <p><?php esc_html_e( 'Account page', 'wshk-custom-redirections' ); ?></p>
                    <p><?php esc_html_e( 'Account page', 'wshk-custom-redirections' ); ?></p>
                    <!--<p><?php esc_html_e( 'Account page', 'wshk-custom-redirections' ); ?></p>-->
                    <p><?php esc_html_e( 'Account page', 'wshk-custom-redirections' ); ?></p>
                    <p><?php esc_html_e( 'Account page', 'wshk-custom-redirections' ); ?></p>
                    <p><?php esc_html_e( 'Woo Shortcodes Kit PRO settings', 'wshk-custom-redirections' ); ?></p>
                    <p><?php esc_html_e( 'Compatibility with third party plugins', 'wshk-custom-redirections' ); ?></p>
                    <p></p>
                </td>
                <td>
                    <p><?php if(get_option('wshk_enableorderscontrol')=='140'){
                    echo '<span style="color:green;" class="dashicons dashicons-yes"></span>';
                    } else {
                    echo '<span style="color:red;" class="dashicons dashicons-no-alt"></span>';
                    }?></p>
                    
                    
                    <p><?php if(get_option('wshk_enablemydownloadsht')=='2000'){
                    echo '<span style="color:green;" class="dashicons dashicons-yes"></span>';
                    } else {
                    echo '<span style="color:red;" class="dashicons dashicons-no-alt"></span>';
                    }?></p>
                    
                    <p><?php if(get_option('wshk_enablemyaddressessht')=='2001'){
                    echo '<span style="color:green;" class="dashicons dashicons-yes"></span>';
                    } else {
                    echo '<span style="color:red;" class="dashicons dashicons-no-alt"></span>';
                    }?></p>
                    
                    <p><?php if(get_option('wshk_enablemypaymentsht')=='2002'){
                    echo '<span style="color:green;" class="dashicons dashicons-yes"></span>';
                    } else {
                    echo '<span style="color:red;" class="dashicons dashicons-no-alt"></span>';
                    }?></p>
                    
                    <p><?php if(get_option('wshk_enablemyeditaccsht')=='2003'){
                    echo '<span style="color:green;" class="dashicons dashicons-yes"></span>';
                    } else {
                    echo '<span style="color:red;" class="dashicons dashicons-no-alt"></span>';
                    }?></p>
                    
                    <!--<p><?php if(get_option('wshk_enabledashbsht')=='2004'){
                    echo '<span style="color:green;" class="dashicons dashicons-yes"></span>';
                    } else {
                    echo '<span style="color:red;" class="dashicons dashicons-no-alt"></span>';
                    }?></p>-->
                    
                    <p><?php if(get_option('wshk_enablelogoutbtn')=='12'){
                    echo '<span style="color:green;" class="dashicons dashicons-yes"></span>';
                    } else {
                    echo '<span style="color:red;" class="dashicons dashicons-no-alt"></span>';
                    }?></p>
                    
                    <p><?php if(get_option('wshk_enableloginform')=='13'){
                    echo '<span style="color:green;" class="dashicons dashicons-yes"></span>';
                    } else {
                    echo '<span style="color:red;" class="dashicons dashicons-no-alt"></span>';
                    }?></p>
                    
                    <p><?php if(get_option('wshk_enablescusre')=='99'){
                    echo '<span style="color:green;" class="dashicons dashicons-yes"></span>';
                    } else {
                    echo '<span style="color:red;" class="dashicons dashicons-no-alt"></span>';
                    }?></p>
                    
                    <p><?php if(get_option('wshk_enablewshkshortcodeselementor')=='18710902'){
                    echo '<span style="color:green;" class="dashicons dashicons-yes"></span>';
                    } else {
                    echo '<span style="color:red;" class="dashicons dashicons-no-alt"></span>';
                    }?></p>
                </td>
            </tr>
        </table>

        <br><br><br>
    </div>
           
    
    <!--END WSHK shortcodes for Elementor -->   
    
           
    <div class="accordion elem">
        
        <table>
            <colgroup><col span="2"></colgroup>
            
            <tr>
                <th>
                    <p><input type="checkbox" class="testininputclass" id="wshk_enablecustomblockselementor" name="wshk_enablecustomblockselementor" value='18710901' <?php if(get_option('wshk_enablecustomblockselementor')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablecustomblockselementor></label><br />
                </th>
                <th class="forcontainertitles" style="width:100%;padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Custom blocks for Elementor', 'wshk-custom-redirections' ); ?></big><br /><small> <?php esc_html_e( 'Just need activate it and configure from Elementor builder!', 'wshk-custom-redirections' ); ?></small></p>
                </th>
                <th class="hideribopro"><span class="compatribbon elementor">ELEMENTOR</span>
                </th>
            </tr>
        </table>
    </div>
    
    <div class="panel">
        
    <div style="width:96%;margin-top: 20px; margin-bottom: 15px;"><table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/custom-blocks-for-elementor/" target="_blank" style="color: grey;"><span class="dashicons dashicons-format-video"></span> <?php esc_html_e( 'How work? ', 'wshk-custom-redirections' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/user-zone/#tab5" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'wshk-custom-redirections' ); ?></a></td></tr></table></div>
    
    <br><br><br><br>
    
        <table width="100%">
            <tr>
                <td class="forsmalldropdowns" style="width:34%;padding:20px;">
                <p style="text-align:center;"><big><span style="font-size:36px;" class="dashicons dashicons-paperclip"></span><br><br><?php esc_html_e( 'Enabling this function, you can restrict the content to be displayed to logged in users or non logged in users.', 'wshk-custom-redirections' ); ?></big></p>    
                </td>
                <td class="forsmalldropdowns" style="width:33%;padding:20px;">
                  <p style="text-align:center;"><big><span style="font-size:36px;" class="dashicons dashicons-id"></span><br><br><?php esc_html_e( 'The configuration will be from Elementor page builder, just edit a section and go to advanced tab. ', 'wshk-custom-redirections' ); ?></big>
                </td>
                <td class="forsmalldropdowns" style="width:33%;padding:20px;">
                   <p style="text-align:center;"><big><span style="font-size:36px;" class="dashicons dashicons-admin-media"></span><br><br><?php esc_html_e( 'Enable the function on each element and choose if is visible or hidden for logged in users.', 'wshk-custom-redirections' ); ?></big> 
                </td>
            </tr>
        </table>

    <br><br>
    
    </div>
           
    <!--END Custom blocks for Elementor -->
      
      
    <!--<div class="accordion elem">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enablewshkcustomelemlibrary" name="wshk_enablewshkcustomelemlibrary" value='18710911' <?php if(get_option('wshk_enablewshkcustomelemlibrary')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablewshkcustomelemlibrary></label><br /></th><th class="forcontainertitles" style="width:100%;padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'WSHK custom templates for Elementor', 'wshk-custom-redirections' ); ?> </big><br /><small> <?php esc_html_e( 'Works with the same Elementor templates library!', 'wshk-custom-redirections' ); ?></small></p></th><th class="hideribopro"><span class="compatribbon elementor">ELEMENTOR</span></th></tr>
    </table>
</div>
<div class="panel">
<div style="width:96%;margin-top: 20px; margin-bottom: 15px;"><table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/wshk-custom-templates-for-elementor/" target="_blank" style="color: grey;"><span class="dashicons dashicons-format-video"></span> <?php esc_html_e( 'How work? ', 'wshk-custom-redirections' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/user-zone/#tab5" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'wshk-custom-redirections' ); ?></a></td></tr></table></div><br />
<br><br><br>
<table width="100%">
    <tr>
        <td class="forsmalldropdowns" style="width:34%;padding:20px;">
        <p style="text-align:center;"><big><span style="font-size:36px;" class="dashicons dashicons-index-card"></span><br><br><?php esc_html_e( 'By enabling this feature, you will unlock WSHK templates in your Elementor template library.', 'wshk-custom-redirections' ); ?></big></p>    
        </td>
        <td class="forsmalldropdowns" style="width:33%;padding:20px;">
          <p style="text-align:center;"><big><span style="font-size:36px;" class="dashicons dashicons-images-alt2"></span><br><br><?php esc_html_e( 'Choose your favorite template, it can be inserted as another Elementor template.', 'wshk-custom-redirections' ); ?></big>
        </td>
        <td class="forsmalldropdowns" style="width:33%;padding:20px;">
           <p style="text-align:center;"><big><span style="font-size:36px;" class="dashicons dashicons-filter"></span><br><br><?php esc_html_e( 'You can search for WSHK in Elementor template library and it will show all WSHK templates.', 'wshk-custom-redirections' ); ?></big> 
        </td>
    </tr>
</table>





    <br><br>
    </div>-->
           
           
      <!--END Custom blocks for Elementor -->
      
      
      
      
           
           
           
           <!--<br><br>-->
    
    
    <div class="accordion elem">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enablesubscription" name="wshk_enablesubscription" value='3002' <?php if(get_option('wshk_enablesubscription')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablesubscription></label><br /></th><th class="forcontainertitles" style="width:100%;padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Compatibility between Woo Subscriptions and Custom redirections', 'wshk-custom-redirections' ); ?></big><br /><small> <?php esc_html_e( 'Just need activate it and the plugins will work together!', 'wshk-custom-redirections' ); ?></small></p></th><th class="hideribopro"><span class="compatribbon subs">SUBSCRIPTIONS</span></th></tr>
    </table>
</div>
<div class="panel">
<div style="width:96%;margin-top: 20px; margin-bottom: 15px;"><table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/woocommerce-subscriptions-compatibility/" target="_blank" style="color: grey;"><span class="dashicons dashicons-format-video"></span> <?php esc_html_e( 'How work? ', 'wshk-custom-redirections' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/user-zone/#tab5" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'wshk-custom-redirections' ); ?></a></td></tr></table></div><br />
<br><br>

<br>
    <p style="background-color:#f4f1ff;color:#a46497;padding:30px;text-align:left;"><big><span class="dashicons dashicons-warning"></span> <?php esc_html_e( 'By default, Woo Subscriptions only work with the default WC account system, but with this function all the links in the subscriptions table, related subscriptions and related orders will work with the Custom redirections function.', 'wshk-custom-redirections' ); ?></big><br><br><span class="dashicons dashicons-warning"></span> <?php esc_html_e( 'You only need enable the function and configure the custom redirections fields with the containers ID. ', 'wshk-custom-redirections' ); ?></big></p>
    <br />

<br><br>
    
    </div>
    
      <!-- END WC SUBSCRIPTIONS COMPATIBILITY -->
    
    
    
    <div class="accordion elem">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enablesubscriptionshortcode" name="wshk_enablesubscriptionshortcode" value='3003' <?php if(get_option('wshk_enablesubscriptionshortcode')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablesubscriptionshortcode></label><br /></th><th class="forcontainertitles" style="width:100%;padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Woo Subscriptions custom shortcode', 'wshk-custom-redirections' ); ?></big><br /><small> <?php esc_html_e( 'Just need activate it and use in your custom account page!', 'wshk-custom-redirections' ); ?></small></p></th><th class="hideribopro"><span class="compatribbon subs">SUBSCRIPTIONS</span></th></tr>
    </table>
</div>
<div class="panel">
<div style="width:96%;margin-top: 20px; margin-bottom: 15px;"><table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/woocommerce-subscriptions-custom-shortcode/" target="_blank" style="color: grey;"><span class="dashicons dashicons-format-video"></span> <?php esc_html_e( 'How work? ', 'wshk-custom-redirections' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/user-zone/#tab5" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'wshk-custom-redirections' ); ?></a></td></tr></table></div><br />
<br><br>


<p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'The shortcode', 'wshk-custom-redirections' ); ?></b><br><small><?php esc_html_e( 'If you are building your custom account page, use this shortcode.', 'wshk-custom-redirections' ); ?></small></p>
<br><br><br>
    <div onmousedown="return false;" onselectstart="return false;" class="wshkshtboxes">
<table style="margin-top:-20px;">
          <colgroup>
    <col span="3">
   
  </colgroup>
         <tr>
        <td class="shtboxone" style="width: 25%; padding-left: 30px;"><p><big><strong><span class="dashicons dashicons-code-standards"></span> <?php esc_html_e( 'Shortcode:', 'woo-shortcodes-kit' ); ?></strong><br><input class="testininputclass" onmousedown="return false;" onselectstart="return false;" style="color:white;margin-top:10px;outline:0;-moz-outline: 0;border:none;" type="text" value="[woo_mysubscriptions]" id="wshkcustomsubscriptions" readonly></big><br /><br /></p></td>
        
        <td class="shtboxtwo" style="width: 23%; padding-left: 30px;"><p><big>

<div class="tooltip" style="width:120px;">
<button class="wshkshtboxesbtn" style="width:150px;" type="button" onclick="myFunctionwshkcustomsubscriptions()" onmouseout="outFunwshkcustomsubscriptions()">
  <span class="tooltiptext" id="myTooltipwshkcustomsubscriptions"><?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?></span>
  <?php esc_html_e( 'Copy shortcode', 'woo-shortcodes-kit' ); ?>
  </button>
</div>



<script>

document.getElementById("wshkcustomsubscriptions").addEventListener("mousedown", function(event){
  event.preventDefault();
});

function myFunctionwshkcustomsubscriptions() {
  var copyText = document.getElementById("wshkcustomsubscriptions");
  copyText.select();
  document.execCommand("copy");
  
  var tooltipwshkcustomsubscriptions = document.getElementById("myTooltipwshkcustomsubscriptions");
  tooltipwshkcustomsubscriptions.innerHTML = "<?php esc_html_e( 'Copied:', 'woo-shortcodes-kit' ); ?> " + copyText.value;
}

function outFunwshkcustomsubscriptions() {
  var tooltipwshkcustomsubscriptions = document.getElementById("myTooltipwshkcustomsubscriptions");
  tooltipwshkcustomsubscriptions.innerHTML = "<?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?>";
}
</script></big><br /><br /> </p></td>
        
        <td class="shtboxthree" style="width: 46%; padding-left: 30px;"><p><span class="dashicons dashicons-warning"></span><big style="font-size:14px !important;"><strong><?php esc_html_e( 'Copy the shortcode and paste in your custom account page', 'woo-shortcodes-kit' ); ?></strong></big><br /><br /></p></td></tr>
        
        <br />
        <br />
        </table>
</div>
<br><br>


<br>
    <p style="width:80%;background-color:#f4f1ff;color:#a46497;padding:30px;text-align:left;"><big><span class="dashicons dashicons-warning"></span> <?php esc_html_e( 'If you dont need display the subscriptions tab and just want use the view order details and the related subscriptions, just keep disabled this function and use same container ID for the orders and the subscriptions in the custom redirections fields. This function only must be enabled if you are using the custom shortcode.', 'wshk-custom-redirections' ); ?></big></p>
    <br />


    
    <br><br>
    </div>
    
    
    <!-- END WC SUBSCRIPTIONS SHORTCODE -->
    
    
    
    <div class="accordion elem">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enablemembershipcompat" name="wshk_enablemembershipcompat" value='3005' <?php if(get_option('wshk_enablemembershipcompat')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablemembershipcompat></label><br /></th><th class="forcontainertitles" style="width:100%;padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Woo Membership compatibility and shortcodes', 'wshk-custom-redirections' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'UPDATED', 'woo-shortcodes-kit' ); ?></span>--></big><br /><small> <?php esc_html_e( 'Just need activate it and use the shortcodes in your custom account page!', 'wshk-custom-redirections' ); ?></small></p></th><th class="hideribopro"><span class="compatribbon memb">MEMBERSHIPS</span></th></tr>
    </table>
</div>
<div class="panel">
<div style="width:96%;margin-top: 20px; margin-bottom: 15px;"><table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/woocommerce-membership-compatibility-and-shortcodes/" target="_blank" style="color: grey;"><span class="dashicons dashicons-format-video"></span> <?php esc_html_e( 'How work? ', 'wshk-custom-redirections' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/user-zone/#tab5" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'wshk-custom-redirections' ); ?></a></td></tr></table></div><br />
<br><br>


<p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'Woo Membership table shortcode', 'wshk-custom-redirections' ); ?></b><br><small><?php esc_html_e( 'If you are building your custom account page, use this shortcode.', 'wshk-custom-redirections' ); ?></small></p>
<br><br><br>
    <div onmousedown="return false;" onselectstart="return false;" class="wshkshtboxes">
<table style="margin-top:-20px;">
          <colgroup>
    <col span="3">
   
  </colgroup>
         <tr>
        <td class="shtboxone" style="width: 25%; padding-left: 30px;"><p><big><strong><span class="dashicons dashicons-code-standards"></span> <?php esc_html_e( 'Shortcode:', 'woo-shortcodes-kit' ); ?></strong><br><input class="testininputclass" onmousedown="return false;" onselectstart="return false;" style="color:white;margin-top:10px;outline:0;-moz-outline: 0;border:none;" type="text" value="[woo_memberships_table]" id="wshkcustommembership" readonly></big><br /><br /></p></td>
        
        <td class="shtboxtwo" style="width: 23%; padding-left: 30px;"><p><big>

<div class="tooltip" style="width:120px;">
<button class="wshkshtboxesbtn" style="width:150px;" type="button" onclick="myFunctionwshkcustommembership()" onmouseout="outFunwshkcustommembership()">
  <span class="tooltiptext" id="myTooltipwshkcustommembership"><?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?></span>
  <?php esc_html_e( 'Copy shortcode', 'woo-shortcodes-kit' ); ?>
  </button>
</div>



<script>

document.getElementById("wshkcustommembership").addEventListener("mousedown", function(event){
  event.preventDefault();
});

function myFunctionwshkcustommembership() {
  var copyText = document.getElementById("wshkcustommembership");
  copyText.select();
  document.execCommand("copy");
  
  var tooltipwshkcustommembership = document.getElementById("myTooltipwshkcustommembership");
  tooltipwshkcustommembership.innerHTML = "<?php esc_html_e( 'Copied:', 'woo-shortcodes-kit' ); ?> " + copyText.value;
}

function outFunwshkcustommembership() {
  var tooltipwshkcustommembership = document.getElementById("myTooltipwshkcustommembership");
  tooltipwshkcustommembership.innerHTML = "<?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?>";
}
</script></big><br /><br /> </p></td>
        
        <td class="shtboxthree" style="width: 46%; padding-left: 30px;"><p><span class="dashicons dashicons-warning"></span><big style="font-size:14px !important;"><strong><?php esc_html_e( 'Copy the shortcode and paste in your custom account page', 'woo-shortcodes-kit' ); ?></strong></big><br /><br /></p></td></tr>
        
        <br />
        <br />
        </table>
</div>
<br><br>



<br><br>


<p><b>2.- <?php esc_html_e( 'Woo Membership content shortcode', 'wshk-custom-redirections' ); ?></b><br><small><?php esc_html_e( 'If you are building your custom account page, use this shortcode.', 'wshk-custom-redirections' ); ?></small></p>
<br><br><br>
    <div onmousedown="return false;" onselectstart="return false;" class="wshkshtboxes">
<table style="margin-top:-20px;">
          <colgroup>
    <col span="3">
   
  </colgroup>
         <tr>
        <td class="shtboxone" style="width: 25%; padding-left: 30px;"><p><big><strong><span class="dashicons dashicons-code-standards"></span> <?php esc_html_e( 'Shortcode:', 'woo-shortcodes-kit' ); ?></strong><br><input class="testininputclass" onmousedown="return false;" onselectstart="return false;" style="color:white;margin-top:10px;outline:0;-moz-outline: 0;border:none;" type="text" value="[woo_membership_content]" id="wshkcustommembershipcontent" readonly></big><br /><br /></p></td>
        
        <td class="shtboxtwo" style="width: 23%; padding-left: 30px;"><p><big>

<div class="tooltip" style="width:120px;">
<button class="wshkshtboxesbtn" style="width:150px;" type="button" onclick="myFunctionwshkcustommembershipcontent()" onmouseout="outFunwshkcustommembershipcontent()">
  <span class="tooltiptext" id="myTooltipwshkcustommembershipcontent"><?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?></span>
  <?php esc_html_e( 'Copy shortcode', 'woo-shortcodes-kit' ); ?>
  </button>
</div>



<script>

document.getElementById("wshkcustommembershipcontent").addEventListener("mousedown", function(event){
  event.preventDefault();
});

function myFunctionwshkcustommembershipcontent() {
  var copyText = document.getElementById("wshkcustommembershipcontent");
  copyText.select();
  document.execCommand("copy");
  
  var tooltipwshkcustommembershipcontent = document.getElementById("myTooltipwshkcustommembershipcontent");
  tooltipwshkcustommembershipcontent.innerHTML = "<?php esc_html_e( 'Copied:', 'woo-shortcodes-kit' ); ?> " + copyText.value;
}

function outFunwshkcustommembershipcontent() {
  var tooltipwshkcustommembershipcontent = document.getElementById("myTooltipwshkcustommembershipcontent");
  tooltipwshkcustommembershipcontent.innerHTML = "<?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?>";
}
</script></big><br /><br /> </p></td>
        
        <td class="shtboxthree" style="width: 46%; padding-left: 30px;"><p><span class="dashicons dashicons-warning"></span><big style="font-size:14px !important;"><strong><?php esc_html_e( 'Copy the shortcode and paste in your custom account page', 'woo-shortcodes-kit' ); ?></strong></big><br /><br /></p></td></tr>
        
        <br />
        <br />
        </table>
</div>
<br><br><br>

<p class="funcordersteptwo"><b>3.- <?php esc_html_e( 'Compatibility with View Billing button', 'wshk-custom-redirections' ); ?></b><br><small><?php esc_html_e( 'When a membership is linked to a subscription, a new action button appears in the membership table called "View billing." Originally after pressing this button the user is redirected to the subscription details, so if you already have a tab with the subscription shortcode configured, you just have to activate this option.', 'wshk-custom-redirections' ); ?></small></p>
<br>
<p class="forsmalldropdowns" style="width:45%;padding-left:30px;">
<p class="wshkfunctinputs"><input type="checkbox" id="wshk_enableviewbilling" name="wshk_enableviewbilling" value='35' <?php if(get_option('wshk_enableviewbilling')!=''){ echo ' checked="checked"'; }?> /><label for="wshk_enableviewbilling"><?php esc_html_e( 'Enable custom redirections compatibility with View Billing button', 'wshk-custom-redirections' ); ?> <!--<small style="color:#aadb4a;">(<?php esc_html_e( 'NEW', 'woo-shortcodes-kit' ); ?>)</small>--></label></p>

<br>
<?php esc_html_e( 'View Billing button text', 'wshk-custom-redirections' ); ?><br /><input class="testininputclass" type="text" name="wshk_viewbillingtext" id="wshk_viewbillingtext" value="<?php if(get_option('wshk_viewbillingtext')!=''){ echo get_option('wshk_viewbillingtext'); }?>" placeholder="<?php esc_html_e( 'Linked Subscription', 'wshk-custom-redirections' ); ?>" size="10" /></p>

<br>

<br>
    <p style="width:80%;background-color:#f4f1ff;color:#a46497;padding:30px;text-align:left;"><big><span class="dashicons dashicons-warning"></span> <?php esc_html_e( 'To customize the redirection of advanced actions, you need to go to WOO SHORTCODES KIT PRO SETTINGS, look for the function called: Custom redirections for advanced actions of WooCommerce my account, and configure the ID of the container to redirect.', 'wshk-custom-redirections' ); ?></big></p>
    <br />


    
    <br><br>
    </div>
    
    
    <!-- END WC MEMBERSHIP COMPATIBILITY AND SHORTCODE -->
    
    
    
    
    
    
    
    
    <div class="accordion elem">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enabledivitbdetect" name="wshk_enabledivitbdetect" value='18911001' <?php if(get_option('wshk_enabledivitbdetect')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enabledivitbdetect></label><br /></th><th class="forcontainertitles" style="width:100%;padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'DIVI tabs linkeables', 'wshk-custom-redirections' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'NEW', 'woo-shortcodes-kit' ); ?></span>--></big><br /><small> <?php esc_html_e( 'Just need activate it if you are using the DIVI tabs and want them to be linkeable from custom links!', 'wshk-custom-redirections' ); ?></small></p></th><th class="hideribopro"><span class="compatribbon divi">DIVI</span></th></tr>
    </table>
</div>
<div class="panel"><br /><br />
<div style="width:96%;margin-top: 0px; margin-bottom: 15px;"><table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/divi-tabs-compatibility/" target="_blank" style="color: grey;"><span class="dashicons dashicons-format-video"></span> <?php esc_html_e( 'How work? ', 'wshk-custom-redirections' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/user-zone/#tab5" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'wshk-custom-redirections' ); ?></a></td></tr></table></div>
<br><br>

<p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'The shortcode', 'wshk-custom-redirections' ); ?></b><br><small><?php esc_html_e( 'You can use it on any page or post. ', 'wshk-custom-redirections' ); ?></small></p>
<br><br><br>
    <div onmousedown="return false;" onselectstart="return false;" class="wshkshtboxes">
<table style="margin-top:-20px;">
          <colgroup>
    <col span="3">
   
  </colgroup>
         <tr>
        <td class="shtboxone" style="width: 25%; padding-left: 30px;"><p><big><strong><span class="dashicons dashicons-code-standards"></span> <?php esc_html_e( 'Shortcode:', 'woo-shortcodes-kit' ); ?></strong><br><input class="testininputclass" onmousedown="return false;" onselectstart="return false;" style="color:white;margin-top:10px;outline:0;-moz-outline: 0;border:none;" type="text" value="[wshk-detect-divi-tabs]" id="wshkdivitabslink" readonly></big><br /><br /></p></td>
        
        <td class="shtboxtwo" style="width: 23%; padding-left: 30px;"><p><big>

<div class="tooltip" style="width:120px;">
<button class="wshkshtboxesbtn" style="width:150px;" type="button" onclick="myFunctionwshkdivitabslink()" onmouseout="outFunwshkdivitabslink()">
  <span class="tooltiptext" id="myTooltipwshkdivitabslink"><?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?></span>
  <?php esc_html_e( 'Copy shortcode', 'woo-shortcodes-kit' ); ?>
  </button>
</div>



<script>

document.getElementById("wshkdivitabslink").addEventListener("mousedown", function(event){
  event.preventDefault();
});

function myFunctionwshkdivitabslink() {
  var copyText = document.getElementById("wshkdivitabslink");
  copyText.select();
  document.execCommand("copy");
  
  var wshkdivitabslink = document.getElementById("myTooltipwshkdivitabslink");
  wshkdivitabslink.innerHTML = "<?php esc_html_e( 'Copied:', 'woo-shortcodes-kit' ); ?> " + copyText.value;
}

function outFunwshkdivitabslink() {
  var wshkdivitabslink = document.getElementById("myTooltipwshkdivitabslink");
  wshkdivitabslink.innerHTML = "<?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?>";
}
</script></big><br /><br /> </p></td>
        
        <td class="shtboxthree" style="width: 46%; padding-left: 30px;"><p><span class="dashicons dashicons-warning"></span><big style="font-size:14px !important;"><strong><?php esc_html_e( 'Copy the shortcode and paste in your custom page', 'woo-shortcodes-kit' ); ?></strong></big><br /><br /></p></td></tr>
        
        <br />
        <br />
        </table>
</div>
<br><br><br>
<p><b>2.- <?php esc_html_e( 'Add here the ID used on DIVI tabs module', 'wshk-custom-redirections' ); ?></b><br><small><?php esc_html_e( 'Be sure that you are using the same ID used on Divi tabs module', 'wshk-custom-redirections' ); ?></small></p>
<br>
<p style="font-size: 16px;font-weight: 400;padding-bottom:15px;"><?php esc_html_e( 'Custom ID for DIVI tabs module', 'wshk-custom-redirections' ); ?><br /><input class="testininputclass" type="text" name="wshk_customdivitabsmodule" id="wshk_customdivitabsmodule" value="<?php if(get_option('wshk_customdivitabsmodule')!=''){ echo get_option('wshk_customdivitabsmodule'); }?>" placeholder="<?php esc_html_e( '#my-tabs', 'wshk-custom-redirections' ); ?>" size="10" /></p>

<br>
<p><b>3.- <?php esc_html_e( 'Add here the ID used on DIVI text modules', 'wshk-custom-redirections' ); ?></b><br><small><?php esc_html_e( 'Be sure that you are using the same ID used on Divi text modules. ', 'wshk-custom-redirections' ); ?></small></p>
<br>
<p style="font-size: 16px;font-weight: 400;padding-bottom:15px;"><?php esc_html_e( 'Custom ID for DIVI text module', 'wshk-custom-redirections' ); ?><br /><input class="testininputclass" type="text" name="wshk_customdivitextsmodule" id="wshk_customdivitextsmodule" value="<?php if(get_option('wshk_customdivitextsmodule')!=''){ echo get_option('wshk_customdivitextsmodule'); }?>" placeholder="<?php esc_html_e( 'open-tab', 'wshk-custom-redirections' ); ?>" size="10" /></p>

<br>
    <p style="width:85%;background-color:#f4f1ff;color:#a46497;padding:30px;text-align:left;"><big><span class="dashicons dashicons-warning"></span> <?php esc_html_e( 'By default, the Divi tabs module cant be linked from another pages and too cant be use with Custom Redirections for WooCommerce my account advanced actions... to get it, you need to add a custom ID (for example: my-tabs) on the DIVI tabs module.', 'wshk-custom-redirections' ); ?><br><br><?php esc_html_e( 'You will get each tab to have an identifier to be able to link to it, then you can copy the tab identifier slug related with the orders list, addresses and payments method and paste it on the function Custom Redirections for WooCommerce my account advanced actions.', 'wshk-custom-redirections' ); ?><br><br><?php esc_html_e( 'If you want link to any tab from another page, just add in the url of the external button the link to the page and at the end add /#my-tabs|1 to redirect to the tab number two. For example:', 'wshk-custom-redirections' ); ?> mywebsite.com/page-with-divi-tabs/#my-tabs|1<br><br><span class="dashicons dashicons-warning"></span>  <?php esc_html_e( 'But if you are building a custom account page with these tabs and you want to make them linkable from the same page using custom links and hidding the by default tabs headers links, then you need to enable this function and follow these steps:', 'wshk-custom-redirections' ); ?><br><br>1.- <?php esc_html_e( 'Add the shortcode on the account page', 'wshk-custom-redirections' ); ?><br>2.- <?php esc_html_e( 'Add in the function tabs ID field the same ID used on the tabs module', 'wshk-custom-redirections' ); ?><br>3.- <?php esc_html_e( 'Build each custom link using for example the DIVI text module, add a custom link how content on each text module and add a custom ID on each module for example open-tab0, and change the 0 with the given tab number.', 'wshk-custom-redirections' ); ?><br>4.- <?php esc_html_e( 'Add in the function texts module field the same ID used on the texts modules without the number.E.G: open-tab', 'wshk-custom-redirections' ); ?><br><br><?php esc_html_e( 'For example if you have 3 tabs created the link to each of them will be:', 'wshk-custom-redirections' ); ?><br><br><<span>a</span> href="#my-tabs|0">Tab 1<<span>/a</span>><br><<span>a</span> href="#my-tabs|1">Tab 2<<span>/a</span>><br><<span>a</span> href="#my-tabs|2">Tab 3<<span>/a</span>><br><br><?php esc_html_e( 'You need to add on each custom link an ID open-tab0 (changing the 0 with the tab number).', 'wshk-custom-redirections' ); ?></big></p>
    <br />




    <br><br>
    </div>
    
    
    <!-- END DIVI TABS DETECTOR -->
    
    
    <div class="accordion elem">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enablewebtoffeesubsht" name="wshk_enablewebtoffeesubsht" value='3005' <?php if(get_option('wshk_enablewebtoffeesubsht')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablewebtoffeesubsht></label><br /></th><th class="forcontainertitles" style="width:100%;padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Webtoffee Subscriptions compatibility and custom shortcode', 'wshk-custom-redirections' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'NEW', 'woo-shortcodes-kit' ); ?></span>--></big><br /><small> <?php esc_html_e( 'Just need activate it and use in your custom account page!', 'wshk-custom-redirections' ); ?></small></p></th><th class="hideribopro"><span class="compatribbon webtoffee">WEBTOFFEE</span></th></tr>
    </table>
</div>
<div class="panel">
<div style="width:96%;margin-top: 20px; margin-bottom: 15px;"><table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/webtoffee-subscriptions-compatibility-and-custom-shortcode/" target="_blank" style="color: grey;"><span class="dashicons dashicons-format-video"></span> <?php esc_html_e( 'How work? ', 'wshk-custom-redirections' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/user-zone/#tab5" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'wshk-custom-redirections' ); ?></a></td></tr></table></div><br />
<br><br>


<p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'The shortcode', 'wshk-custom-redirections' ); ?></b><br><small><?php esc_html_e( 'If you are building your custom account page, use this shortcode.', 'wshk-custom-redirections' ); ?></small></p>
<br><br><br>
    <div onmousedown="return false;" onselectstart="return false;" class="wshkshtboxes">
<table style="margin-top:-20px;">
          <colgroup>
    <col span="3">
   
  </colgroup>
         <tr>
        <td class="shtboxone" style="width: 25%; padding-left: 30px;"><p><big><strong><span class="dashicons dashicons-code-standards"></span> <?php esc_html_e( 'Shortcode:', 'woo-shortcodes-kit' ); ?></strong><br><input class="testininputclass" onmousedown="return false;" onselectstart="return false;" style="color:white;margin-top:10px;outline:0;-moz-outline: 0;border:none;" type="text" value="[webtoffee_subscriptions]" id="wshkcustomwebtoffeesubs" readonly></big><br /><br /></p></td>
        
        <td class="shtboxtwo" style="width: 23%; padding-left: 30px;"><p><big>

<div class="tooltip" style="width:120px;">
<button class="wshkshtboxesbtn" style="width:150px;" type="button" onclick="myFunctionwshkcustomwebtoffeesubs()" onmouseout="outFunwshkcustomwebtoffeesubs()">
  <span class="tooltiptext" id="myTooltipwshkcustomwebtoffeesubs"><?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?></span>
  <?php esc_html_e( 'Copy shortcode', 'woo-shortcodes-kit' ); ?>
  </button>
</div>



<script>

document.getElementById("wshkcustomwebtoffeesubs").addEventListener("mousedown", function(event){
  event.preventDefault();
});

function myFunctionwshkcustomwebtoffeesubs() {
  var copyText = document.getElementById("wshkcustomwebtoffeesubs");
  copyText.select();
  document.execCommand("copy");
  
  var tooltipwshkcustomwebtoffeesubs = document.getElementById("myTooltipwshkcustomwebtoffeesubs");
  tooltipwshkcustomwebtoffeesubs.innerHTML = "<?php esc_html_e( 'Copied:', 'woo-shortcodes-kit' ); ?> " + copyText.value;
}

function outFunwshkcustomwebtoffeesubs() {
  var tooltipwshkcustomwebtoffeesubs = document.getElementById("myTooltipwshkcustomwebtoffeesubs");
  tooltipwshkcustomwebtoffeesubs.innerHTML = "<?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?>";
}
</script></big><br /><br /> </p></td>
        
        <td class="shtboxthree" style="width: 46%; padding-left: 30px;"><p><span class="dashicons dashicons-warning"></span><big style="font-size:14px !important;"><strong><?php esc_html_e( 'Copy the shortcode and paste in your custom account page', 'woo-shortcodes-kit' ); ?></strong></big><br /><br /></p></td></tr>
        
        <br />
        <br />
        </table>
</div>
<br><br>


<br>
    <p style="width:80%;background-color:#f4f1ff;color:#a46497;padding:30px;text-align:left;"><big><span class="dashicons dashicons-warning"></span> <?php esc_html_e( ' To customize the redirection of advanced actions, you need to go to WOO SHORTCODES KIT PRO SETTINGS, look for the function called: Custom redirections for advanced actions of WooCommerce my account, and configure the ID of the Subscription container to redirect.', 'wshk-custom-redirections' ); ?></big></p>
    <br />


    
    <br><br>
    </div>
    
    
    <!-- END WEBTOFFEE SUBSCRIPTIONS SHORTCODE -->
    
    
      </div>
    </li>
    
    <!-- END COMPATIBILITY SECTION -->
    
    
    
    
      
    
     <!-- WOOCOMMERCE PRO SETTINGS -->
    <li>
     
       <div class="acc_ctrl wshkproset" style="background-color: #fbfbfb; padding: 10px;"><h3 class="wshksettitles"><span class="dashicons dashicons-star-filled"></span> <?php esc_html_e( 'WOO SHORTCODES KIT PRO SETTINGS', 'wshk-custom-redirections' ); ?></h3>
       <p class="wshksettext"><?php esc_html_e( 'Find in this section all the functions and advanced shortcodes to enhance the possibilities of Woo Shortcodes Kit', 'wshk-custom-redirections' ); ?>            
        </p> 
       <img src="<?php echo  plugins_url( 'images/logowshkpro-150x150.png' , __FILE__ );?>" style="width: 64px;height: 64px;display: block;float: right;margin-top: -75px;padding-right:15px;" ;><span style="text-align: center; width: 100px; border: 1px solid #a46497; border-radius: 13px; background-color: #a46497; font-size: 18px; font-weight: bolder; color: white; padding: 15px;display:none;float:right;margin-top: -60px;">WSHK PRO</span></div>
       
       <div class="acc_panel">
    
          <br /><br />
          <div class="accordion elem">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enablescusrecharts" name="wshk_enablescusrecharts" value='450' <?php if(get_option('wshk_enablescusrecharts')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablescusrecharts></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Display chart with user total spent according to the orders status', 'wshk-custom-redirections' ); ?></big><br /><small> <?php esc_html_e( 'Just need activate, configure the options and paste the shortcode where you want!', 'wshk-custom-redirections' ); ?></small></p></th></tr>
    </table>
</div>
<div class="panel"><br /><br />
<div style="width:96%;margin-top: 0px; margin-bottom: 15px;"><table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/display-chart-with-user-data/" target="_blank" style="color: grey;"><span class="dashicons dashicons-format-video"></span> <?php esc_html_e( 'How work? ', 'wshk-custom-redirections' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/user-zone/#tab5" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'wshk-custom-redirections' ); ?></a></td></tr></table></div><br />




<br />

   
    
    <br />
    <br />
    <table width="100%">
    <tr>    
    <td class="forsmalldropdowns wshkprochartbox" style="padding-left: 20px;width: 50%;"></div>
    
    <div style="background-color:#f4f1ff;font-size:16px;line-height:20px;font-weight:400;padding:30px 20px 30px 20px;border:0px solid #a46497;border-radius:13px;color: #a46497;"><span class="dashicons dashicons-info"></span> <span><?php esc_html_e( 'If you want display the total spent by the current user in a chart, just need copy the shortcode and paste in your custom page', 'wshk-custom-redirections' ); ?></span>
<p style="font-size:14px;font-weight:600;"><?php esc_html_e( 'The Y-axis and X-axis graphics titles are set by default for the bar graph type, so if you use the horizontal bar type, remember to change the order of the axis titles.', 'wshk-custom-redirections' ); ?></p>
</div><br><br><br><br>
    
    <div style="font-size: 16px;font-weight: 400;padding-bottom:15px;"><?php esc_html_e( 'TOTAL SPENT CHART SHORTCODE', 'wshk-custom-redirections' ); ?><br /><p style="font-size:18px;font-weight:600;color:#a46497;">[woo_spentchart]</p></div>
    
    <p style="font-size: 16px;font-weight: 400;padding-bottom:15px;"><?php esc_html_e( 'Top chart title', 'wshk-custom-redirections' ); ?><br /><input class="testininputclass" type="text" name="wshk_tbcharttitleone" id="wshk_tbcharttitleone" value="<?php if(get_option('wshk_tbcharttitleone')!=''){ echo get_option('wshk_tbcharttitleone'); }?>" placeholder="<?php esc_html_e( 'TOTAL BALANCE ', 'wshk-custom-redirections' ); ?>" size="10" /></p>
    
    <p style="font-size: 16px;font-weight: 400;padding-bottom:15px;"><?php esc_html_e( 'AxisY title', 'wshk-custom-redirections' ); ?><br /><input class="testininputclass" type="text" name="wshk_tbcharttitletwo" id="wshk_tbcharttitletwo" value="<?php if(get_option('wshk_tbcharttitletwo')!=''){ echo get_option('wshk_tbcharttitletwo'); }?>" placeholder="<?php esc_html_e( 'DOLLARS, EUROS... ', 'wshk-custom-redirections' ); ?>" size="10" /></p>
    
    <p style="font-size: 16px;font-weight: 400;padding-bottom:15px;"><?php esc_html_e( 'AxisX title', 'wshk-custom-redirections' ); ?><br /><input class="testininputclass" type="text" name="wshk_tbcharttitlefour" id="wshk_tbcharttitlefour" value="<?php if(get_option('wshk_tbcharttitlefour')!=''){ echo get_option('wshk_tbcharttitlefour'); }?>" placeholder="<?php esc_html_e( 'ORDERS STATUS', 'wshk-custom-redirections' ); ?>" size="10" /></p>
    
    
    <p style="font-size: 16px;font-weight: 400;padding-bottom:15px;"><?php esc_html_e( 'Chart currency/content', 'wshk-custom-redirections' ); ?><br /><input class="testininputclass" type="text" name="wshk_tbcharttitlefive" id="wshk_tbcharttitlefive" value="<?php if(get_option('wshk_tbcharttitlefive')!=''){ echo get_option('wshk_tbcharttitlefive'); }?>" placeholder="<?php esc_html_e( '$,€...', 'wshk-custom-redirections' ); ?>" size="10" /></p>
    
   <!--<p style="font-size: 16px;font-weight: 400;padding-bottom:15px;"><?php //esc_html_e( 'Currency position', 'wshk-custom-redirections' ); ?><br /><input type="text" name="wshk_tbcharttitlesix" id="wshk_tbcharttitlesix" value="<?php //if(get_option('wshk_tbcharttitlesix')!=''){ echo get_option('wshk_tbcharttitlesix'); }?>" placeholder="<?php //esc_html_e( 'left/right', 'wshk-custom-redirections' ); ?>" size="10" /></p>-->
    
    
    
    
    
    
    <!--<p style="font-size: 16px;font-weight: 400;padding-bottom:15px;"><?php //esc_html_e( 'Chart type', 'wshk-custom-redirections' ); ?><br /><input type="text" name="wshk_tbcharttitletres" id="wshk_tbcharttitletres" value="<?php //if(get_option('wshk_tbcharttitletres')!=''){ echo get_option('wshk_tbcharttitletres'); }?>" placeholder="<?php //esc_html_e( 'bar', 'wshk-custom-redirections' ); ?>" size="10" /></p>-->
    
    
    
    
    <!--<p style="font-size: 16px;font-weight: 400;padding-bottom:15px;"><?php //esc_html_e( 'Chart height (in px)', 'wshk-custom-redirections' ); ?><br /><input type="number" name="wshk_tbcharttitleseven" id="wshk_tbcharttitleseven" value="<?php //if(get_option('wshk_tbcharttitleseven')!=''){ echo get_option('wshk_tbcharttitleseven'); }?>" placeholder="<?php //esc_html_e( '370', 'wshk-custom-redirections' ); ?>" size="10" /></p>-->
        

    
    </td> 
    <td class="forsmalldropdowns" style="padding-left: 20px; width: 50%;">
        
    <div style="font-size: 16px;font-weight: 400;padding-bottom:15px;margin-top:50px;"><?php esc_html_e( 'CHART OPTIONS', 'wshk-custom-redirections' ); ?><br /><p><?php esc_html_e( 'Your chart, your rules', 'wshk-custom-redirections' ); ?></p></div>
    
    <p style="font-size: 16px;font-weight: 400;"> <?php esc_html_e( 'Currency position', 'wshk-custom-redirections' ); ?><br /><select  style="width: 400px !important; min-width: 400px; max-width: 400px;" name="wshk_tbcharttitlesix" id="wshk_tbcharttitlesix"> <option <?php if (get_option('wshk_tbcharttitlesix') == 'left') { ?>selected="true" <?php }; ?> value="left"><?php esc_html_e( 'Display currency before the total', 'wshk-custom-redirections' ); ?></option> <option <?php if (get_option('wshk_tbcharttitlesix') == 'right') { ?>selected="true" <?php }; ?> value="right"><?php esc_html_e( 'Display currency after the total', 'wshk-custom-redirections' ); ?></option> </select> <br /></p><br>
    
    <p style="font-size: 16px;font-weight: 400;"> <?php esc_html_e( 'Chart type', 'wshk-custom-redirections' ); ?><br /><select  style="width: 400px !important; min-width: 400px; max-width: 400px;" name="wshk_tbcharttitletres" id="wshk_tbcharttitletres"> <option <?php if (get_option('wshk_tbcharttitletres') == 'bar') { ?>selected="true" <?php }; ?> value="bar"><?php esc_html_e( 'Bar', 'wshk-custom-redirections' ); ?></option> <option <?php if (get_option('wshk_tbcharttitletres') == 'horizontalBar') { ?>selected="true" <?php }; ?> value="horizontalBar"><?php esc_html_e( 'Horizontal Bar', 'wshk-custom-redirections' ); ?></option></select> <br /></p><br>
    
    <!--<p style="font-size: 16px;font-weight: 400;padding-bottom:15px;"><?php esc_html_e( 'Display Top chart title', 'wshk-custom-redirections' ); ?><br /><input type="text" name="wshk_occharttitleone" id="wshk_occharttitleone" value="<?php /*if(get_option('wshk_occharttitleone')!=''){ echo get_option('wshk_occharttitleone'); }?>" placeholder="<?php esc_html_e( 'True/False ', 'wshk-custom-redirections' ); */?>" size="10" /></p>-->
    
    <p style="font-size: 16px;font-weight: 400;"> <?php esc_html_e( 'Display top chart title', 'wshk-custom-redirections' ); ?><br /><select  style="width: 400px !important; min-width: 400px; max-width: 400px;" name="wshk_occharttitleone" id="wshk_occharttitleone"> <option <?php if (get_option('wshk_occharttitleone') == 'true') { ?>selected="true" <?php }; ?> value="true"><?php esc_html_e( 'Show', 'wshk-custom-redirections' ); ?></option> <option <?php if (get_option('wshk_occharttitleone') == 'false') { ?>selected="true" <?php }; ?> value="false"><?php esc_html_e( 'Hide', 'wshk-custom-redirections' ); ?></option> </select> <br /></p><br>
    
    
    <!--<p style="font-size: 16px;font-weight: 400;padding-bottom:15px;"><?php esc_html_e( 'Display AxisY title', 'wshk-custom-redirections' ); ?><br /><input type="text" name="wshk_occharttitletwo" id="wshk_occharttitletwo" value="<?php /*if(get_option('wshk_occharttitletwo')!=''){ echo get_option('wshk_occharttitletwo'); }?>" placeholder="<?php esc_html_e( 'True/False ', 'wshk-custom-redirections' ); */?>" size="10" /></p>-->
    
    <p style="font-size: 16px;font-weight: 400;"> <?php esc_html_e( 'Display AxisY title', 'wshk-custom-redirections' ); ?><br /><select  style="width: 400px !important; min-width: 400px; max-width: 400px;" name="wshk_occharttitletwo" id="wshk_occharttitletwo"> <option <?php if (get_option('wshk_occharttitletwo') == 'true') { ?>selected="true" <?php }; ?> value="true"><?php esc_html_e( 'Show', 'wshk-custom-redirections' ); ?></option> <option <?php if (get_option('wshk_occharttitletwo') == 'false') { ?>selected="true" <?php }; ?> value="false"><?php esc_html_e( 'Hide', 'wshk-custom-redirections' ); ?></option> </select> <br /></p><br>
    
    <!--<p style="font-size: 16px;font-weight: 400;padding-bottom:15px;"><?php esc_html_e( 'Display AxisX title', 'wshk-custom-redirections' ); ?><br /><input type="text" name="wshk_occharttitletres" id="wshk_occharttitletres" value="<?php /*if(get_option('wshk_occharttitletres')!=''){ echo get_option('wshk_occharttitletres'); }?>" placeholder="<?php esc_html_e( 'True/False', 'wshk-custom-redirections' ); */?>" size="10" /></p>-->
    
    <p style="font-size: 16px;font-weight: 400;"> <?php esc_html_e( 'Display AxisX title', 'wshk-custom-redirections' ); ?><br /><select  style="width: 400px !important; min-width: 400px; max-width: 400px;" name="wshk_occharttitletres" id="wshk_occharttitletres"> <option <?php if (get_option('wshk_occharttitletres') == 'true') { ?>selected="true" <?php }; ?> value="true"><?php esc_html_e( 'Show', 'wshk-custom-redirections' ); ?></option> <option <?php if (get_option('wshk_occharttitletres') == 'false') { ?>selected="true" <?php }; ?> value="false"><?php esc_html_e( 'Hide', 'wshk-custom-redirections' ); ?></option> </select> <br /></p><br>
    
    <!--<p style="font-size: 16px;font-weight: 400;padding-bottom:15px;"><?php esc_html_e( 'Display colors in tooltip', 'wshk-custom-redirections' ); ?><br /><input type="text" name="wshk_occharttitlefour" id="wshk_occharttitlefour" value="<?php /*if(get_option('wshk_occharttitlefour')!=''){ echo get_option('wshk_occharttitlefour'); }?>" placeholder="<?php esc_html_e( 'True/False', 'wshk-custom-redirections' ); */?>" size="10" /></p>-->
    
    <p style="font-size: 16px;font-weight: 400;"> <?php esc_html_e( 'Display colors in tooltips', 'wshk-custom-redirections' ); ?><br /><select style="width: 400px !important; min-width: 400px; max-width: 400px;" name="wshk_occharttitlefour" id="wshk_occharttitlefour"> <option <?php if (get_option('wshk_occharttitlefour') == 'true') { ?>selected="true" <?php }; ?> value="true"><?php esc_html_e( 'Show', 'wshk-custom-redirections' ); ?></option> <option <?php if (get_option('wshk_occharttitlefour') == 'false') { ?>selected="true" <?php }; ?> value="false"><?php esc_html_e( 'Hide', 'wshk-custom-redirections' ); ?></option> </select> <br /></p><br>
    
    <!--<p style="font-size: 16px;font-weight: 400;padding-bottom:15px;"><?php esc_html_e( 'Display chart legend', 'wshk-custom-redirections' ); ?><br /><input type="text" name="wshk_occharttitlefive" id="wshk_occharttitlefive" value="<?php /*if(get_option('wshk_occharttitlefive')!=''){ echo get_option('wshk_occharttitlefive'); }?>" placeholder="<?php esc_html_e( 'True/False', 'wshk-custom-redirections' ); */?>" size="10" /></p>-->
    
    <!--<p style="font-size: 16px;font-weight: 400;"> <?php esc_html_e( 'Display chart legend', 'woo-shortcodes-kit' ); ?><br /><select name="wshk_occharttitlefive" id="wshk_occharttitlefive"> <option <?php if (get_option('wshk_occharttitlefive') == 'true') { ?>selected="true" <?php }; ?> value="true"><?php esc_html_e( 'Show', 'woo-shortcodes-kit' ); ?></option> <option <?php /*if (get_option('wshk_occharttitlefive') == 'false') { ?>selected="true" <?php }; ?> value="false"><?php esc_html_e( 'Hide', 'woo-shortcodes-kit' ); */?></option> </select> <br /></p><br>-->
    
    <!--<p style="font-size: 16px;font-weight: 400;padding-bottom:15px;"><?php esc_html_e( 'Chart animation', 'wshk-custom-redirections' ); ?><br /><input type="text" name="wshk_occharttitlesix" id="wshk_occharttitlesix" value="<?php /*if(get_option('wshk_occharttitlesix')!=''){ echo get_option('wshk_occharttitlesix'); }?>" placeholder="<?php esc_html_e( 'false', 'wshk-custom-redirections' ); */?>" size="10" /></p>-->
    
    <!--<p style="font-size: 16px;font-weight: 400;padding-bottom:15px;"><?php esc_html_e( 'Chart height (in px)', 'wshk-custom-redirections' ); ?><br /><input type="number" name="wshk_occharttitleseven" id="wshk_occharttitleseven" value="<?php /*if(get_option('wshk_occharttitleseven')!=''){ echo get_option('wshk_occharttitleseven'); }*/?>" placeholder="370" size="10" /></p>-->


    </td> 
    </tr>
   
    </table>
    <br />
    <br />
    
    
    </div>
    
    <!-- END ENABLE CHARTS -->
           
           
    
    
    <div class="accordion elem">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enablescusre" name="wshk_enablescusre" value='99' <?php if(get_option('wshk_enablescusre')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablescusre></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Custom redirections for advanced actions of WooCommerce my account', 'wshk-custom-redirections' ); ?> <!--<span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'UPDATED', 'woo-shortcodes-kit' ); ?></span>--></big><br /><small> <?php esc_html_e( 'Just need activate the function and add the containers ID!', 'wshk-custom-redirections' ); ?></small></p></th></tr>
    </table>
</div>
<div class="panel"><br /><br />
<div style="width:96%;margin-top: 0px; margin-bottom: 15px;"><table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/custom-redirections/" target="_blank" style="color: grey;"><span class="dashicons dashicons-format-video"></span> <?php esc_html_e( 'How work? ', 'wshk-custom-redirections' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/user-zone/#tab5" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'wshk-custom-redirections' ); ?></a></td></tr></table></div><br />
<br><br>
<p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'Add the container/tab ID', 'wshk-custom-redirections' ); ?></b><br><small><?php esc_html_e( 'If you want change your View Order, Edit Addresses and Payments methods action URLs, just need add your containers ID in each field:', 'wshk-custom-redirections' ); ?></small></p>

<br />

   
    
    <br />
    <br />
    <table width="100%">
    <tr>    
    <td class="forsmalldropdowns" style="padding-left: 20px;width: 33%;"></div>
    
    <p style="font-size: 16px;font-weight: 400;padding-bottom:15px;"> <span class="dashicons dashicons-cart"></span> <?php esc_html_e( 'Orders container ID: ', 'wshk-custom-redirections' ); ?><br /><br /> <input class="testininputclass" type="text" name="wshk_vieworderid" id="wshk_vieworderid" value="<?php if(get_option('wshk_vieworderid')!=''){ echo get_option('wshk_vieworderid'); }?>" placeholder="#my-custom-orders" size="10" /></p>    
        

    
    </td> 
    <td class="forsmalldropdowns" style="padding-left: 20px; width: 33%;">
    
    <p style="font-size: 16px;font-weight: 400;padding-bottom:15px;"> <span class="dashicons dashicons-location"></span> <?php esc_html_e( 'Addresses container ID: ', 'wshk-custom-redirections' ); ?><br /><br /> <input class="testininputclass" type="text" name="wshk_miaddressesid" id="wshk_miaddressesid" value="<?php if(get_option('wshk_miaddressesid')!=''){ echo get_option('wshk_miaddressesid'); }?>" placeholder="#my-custom-addresses" size="10" /></p>    


    </td> 
     <td class="forsmalldropdowns" style="padding-left: 20px; witdh: 34%;">
     
    <p style="font-size: 16px;font-weight: 400;padding-bottom:15px;"> <span class="dashicons dashicons-money-alt"></span> <?php esc_html_e( 'Payments methods container ID: ', 'wshk-custom-redirections' ); ?><br /><br /> <input class="testininputclass" type="text" name="wshk_mipaymentsid" id="wshk_mipaymentsid" value="<?php if(get_option('wshk_mipaymentsid')!=''){ echo get_option('wshk_mipaymentsid'); }?>" placeholder="#my-custom-payments" size="10" /></p>    

    
    </td>                    
    </tr>
   <tr>
       <td class="forsmalldropdowns" style="padding-left: 20px; width: 33%;">
           <p style="font-size: 16px;font-weight: 400;padding-bottom:15px;"> <span class="dashicons dashicons-backup"></span> <?php esc_html_e( 'Subscriptions container ID: ', 'wshk-custom-redirections' ); ?><br /><br /> <input class="testininputclass" type="text" name="wshk_viewsubscriptionid" id="wshk_viewsubscriptionid" value="<?php if(get_option('wshk_viewsubscriptionid')!=''){ echo get_option('wshk_viewsubscriptionid'); }?>" placeholder="#my-custom-subscriptions" size="10" /></p> 
           </td>
           
           <td class="forsmalldropdowns" style="padding-left: 20px; width: 33%;">
           <p style="font-size: 16px;font-weight: 400;padding-bottom:15px;"> <span class="dashicons dashicons-awards"></span> <?php esc_html_e( 'Membership container ID: ', 'wshk-custom-redirections' ); ?><br /><br /> <input class="testininputclass" type="text" name="wshk_viewmembershipid" id="wshk_viewmembershipid" value="<?php if(get_option('wshk_viewmembershipid')!=''){ echo get_option('wshk_viewmembershipid'); }?>" placeholder="#my-custom-membership" size="10" /></p> 
           </td>
   </tr>
    </table>
    
    <br>
    <p style="background-color:#f4f1ff;color:#a46497;padding:30px;text-align:left;"><big>
        <span class="dashicons dashicons-warning"></span> <?php esc_html_e( 'If you are using Elementor to build your account page, please enable the function called Elementor Tabs linkeables from the section Compatibility with third party plugins.', 'wshk-custom-redirections' ); ?><br><br>
        <span class="dashicons dashicons-warning"></span> <?php esc_html_e( 'If you are using DIVI to build your account page, please enable the function called DIVI tabs linkeables from the section Compatibility with third party plugins.', 'wshk-custom-redirections' ); ?><br><br>
        <span class="dashicons dashicons-warning"></span> <?php esc_html_e( 'The function is compatible with Woo Subscriptions, but need activate too the function called Compatibility between Woo Subscriptions and Custom redirections, from the section Compatibility with third party plugins.', 'wshk-custom-redirections' ); ?><br><br>
        <span class="dashicons dashicons-warning"></span> <?php esc_html_e( 'The function is compatible with Woo Membership, but need activate too the function called Woo Membership compatibility and shortcodes, from the section Compatibility with third party plugins.', 'wshk-custom-redirections' ); ?><br><br>
        <span class="dashicons dashicons-warning"></span> <?php esc_html_e( 'The function is compatible with Webtoffee Subscriptions, but need activate too the function called Webtoffee Subscriptions compatibility and custom shortcode, from the section Compatibility with third party plugins.', 'wshk-custom-redirections' ); ?><br><br>
        </big></p>
    <br />
    <br />
    
    
    
    
    <!-- END CUSTOM REDIRECTIONS -->
    
    
    
      </div>
    
    
    
    
    
    
    <div class="accordion elem">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enablecustomblockss" name="wshk_enablecustomblockss" value='97' <?php if(get_option('wshk_enablecustomblockss')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablecustomblockss></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Custom blocks for logged and non logged in users by ID', 'wshk-custom-redirections' ); ?></big><br /><small> <?php esc_html_e( 'Just need activate the function copy the block ID and paste in your custom ID container!', 'wshk-custom-redirections' ); ?></small></p></th></tr>
    </table>
</div>
<div class="panel"><br /><br />
<style>a.miraqueben:hover{ color: #a46497 !important;}</style>
<div style="width:96%;margin-top: 0px; margin-bottom: 15px;"><table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/custom-blocks-for-logged-and-non-logged-in-users/" target="_blank" style="color: grey;"><span class="dashicons dashicons-format-video"></span> <?php esc_html_e( 'How work? ', 'wshk-custom-redirections' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/user-zone/#tab5" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'wshk-custom-redirections' ); ?></a></td></tr></table></div>
<br><br>

<p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'The shortcode', 'wshk-custom-redirections' ); ?></b><br><small><?php esc_html_e( 'You can use it on any page or post. Adding the shortcode will activate on that page or post the possibility to restrict the content.', 'wshk-custom-redirections' ); ?></small></p>
<br><br><br>
    <div onmousedown="return false;" onselectstart="return false;" class="wshkshtboxes">
<table style="margin-top:-20px;">
          <colgroup>
    <col span="3">
   
  </colgroup>
         <tr>
        <td class="shtboxone" style="width: 25%; padding-left: 30px;"><p><big><strong><span class="dashicons dashicons-code-standards"></span> <?php esc_html_e( 'Shortcode:', 'woo-shortcodes-kit' ); ?></strong><br><input class="testininputclass" onmousedown="return false;" onselectstart="return false;" style="color:white;margin-top:10px;outline:0;-moz-outline: 0;border:none;" type="text" value="[enable_custom_blocks]" id="wshkcustomblocks" readonly></big><br /><br /></p></td>
        
        <td class="shtboxtwo" style="width: 23%; padding-left: 30px;"><p><big>

<div class="tooltip" style="width:120px;">
<button class="wshkshtboxesbtn" style="width:150px;" type="button" onclick="myFunctionwshkcustomblocks()" onmouseout="outFunwshkcustomblocks()">
  <span class="tooltiptext" id="myTooltipwshkcustomblocks"><?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?></span>
  <?php esc_html_e( 'Copy shortcode', 'woo-shortcodes-kit' ); ?>
  </button>
</div>



<script>

document.getElementById("wshkcustomblocks").addEventListener("mousedown", function(event){
  event.preventDefault();
});

function myFunctionwshkcustomblocks() {
  var copyText = document.getElementById("wshkcustomblocks");
  copyText.select();
  document.execCommand("copy");
  
  var tooltipwshkcustomblocks = document.getElementById("myTooltipwshkcustomblocks");
  tooltipwshkcustomblocks.innerHTML = "<?php esc_html_e( 'Copied:', 'woo-shortcodes-kit' ); ?> " + copyText.value;
}

function outFunwshkcustomblocks() {
  var tooltipwshkcustomblocks = document.getElementById("myTooltipwshkcustomblocks");
  tooltipwshkcustomblocks.innerHTML = "<?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?>";
}
</script></big><br /><br /> </p></td>
        
        <td class="shtboxthree" style="width: 46%; padding-left: 30px;"><p><span class="dashicons dashicons-warning"></span><big style="font-size:14px !important;"><strong><?php esc_html_e( 'Copy the shortcode and paste in your custom page', 'woo-shortcodes-kit' ); ?></strong></big><br /><br /></p></td></tr>
        
        <br />
        <br />
        </table>
</div>
<br><br>



<p><b>2.- <?php esc_html_e( 'Restrict the content', 'wshk-custom-redirections' ); ?></b><br><small><?php esc_html_e( 'You can use the differents IDs for restrict content depending of the user status.', 'wshk-custom-redirections' ); ?><br><?php esc_html_e( 'By default have 5 custom ID to use in 5 differents containers for each user status, each ID can be used only once:', 'wshk-custom-redirections' ); ?></small></p>
<br><br><br>

    <table width="100%">
    <tr>    
    <td class="forsmalldropdowns wshkprochartbox" style="padding-left: 20px;width: 50%;"></div>
    <style>
    
    .btn {
    width: 100px;
    height: 25px;
    background: red;
    color: white;
    text-align: center;
    line-height: 25px;
}

ul#list {
    list-style: none;
    width: 400px;
}

ul#list > li {
    width: 100%;
    height: 20px;
    padding:10px;
    background: #60329b;
    border: 1px solid #60329b;
    border-radius: 13px;
    margin-bottom: 3px;
    color: white;
    text-align: center;
    line-height: 20px;
    font-size: 14px;
    letter-spacing: 1px;
    font-weight: 600;
}
    
   </style> 
   
   
    
    
   <ul id="list" class="wshkprochartbox">
       <p style="text-align: center;font-size: 16px; font-weight:600;letter-spacing: 1px;padding-bottom:10px;"><span class="dashicons dashicons-visibility"></span> <?php esc_html_e( 'Logged in users', 'wshk-custom-redirections' ); ?></p>
<li id="element1">wshklogged</li>
<li id="element2">wshkloggedone</li>
<li id="element3">wshkloggedtwo</li>
<li id="element4">wshkloggedthree</li>
<li id="element5">wshkloggedfour</li>
</ul> 



    
    </td> 
    <td class="forsmalldropdowns wshkprochartbox" style="padding-left: 20px; width: 50%;">
    
    <ul id="list" class="wshkprochartbox">
        <p style="text-align: center;font-size: 16px; font-weight:600;letter-spacing: 1px;padding-bottom:10px;"><span class="dashicons dashicons-hidden"></span> <?php esc_html_e( 'Non Logged in users', 'wshk-custom-redirections' ); ?></p>
<li id="elemento1">wshknonlogged</li>
<li id="elemento2">wshknonloggedone</li>
<li id="elemento3">wshknonloggedtwo</li>
<li id="elemento4">wshknonloggedthree</li>
<li id="elemento5">wshknonloggedfour</li>
</ul> 


    </td> 
                        
    </tr>
   
    </table>
    
    
    <!--<h4 style="font-size: 16px;color:grey;text-align: center;border: 2px solid #aadb4a; border-radius: 13px;padding: 10px;"><small><?php esc_html_e( 'Remember put this shortcode in the page to enable the function! ', 'wshk-custom-redirections' ); ?></small> <br /><strong><span style="line-height:25px;color: grey;">[enable_custom_blocks]</span></strong></h4>-->
    
    <br><br><br>
    
    
    
    
    
      </div>
    
    <!-- END CUSTOM BLOCKS -->
           
           
           
          
          <div class="accordion elem">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enablecustomeravataruploader" name="wshk_enablecustomeravataruploader" value='18610301' <?php if(get_option('wshk_enablecustomeravataruploader')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablecustomeravataruploader></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Customer avatar uploader on edit account', 'wshk-custom-redirections' ); ?></big><br /><small> <?php esc_html_e( 'Just need activate it and nothing more!', 'wshk-custom-redirections' ); ?></small></p></th></tr>
    </table>
</div>
<div class="panel">
<div style="width:96%;margin-top: 20px; margin-bottom: 15px;"><table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/customer-avatar-uploader-on-edit-account/" target="_blank" style="color: grey;"><span class="dashicons dashicons-format-video"></span> <?php esc_html_e( 'How work? ', 'wshk-custom-redirections' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/user-zone/#tab5" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'wshk-custom-redirections' ); ?></a></td></tr></table></div><br />
<br><br><br><br>
<table width="100%">
    <tr>
        <td class="forsmalldropdowns" style="width:34%;padding:20px;">
        <p style="text-align:center;"><big><span style="font-size:36px;" class="dashicons dashicons-paperclip"></span><br><br><?php esc_html_e( 'Enabling this function, you will allow customers to upload their custom profile avatar.', 'wshk-custom-redirections' ); ?></big></p>    
        </td>
        <td class="forsmalldropdowns" style="width:33%;padding:20px;">
            <p style="text-align:center;"><big><span style="font-size:36px;" class="dashicons dashicons-thumbs-up"></span><br><br><?php esc_html_e( 'The custom avatar is displayed correctly on all sites where the user avatar is used by default.', 'wshk-custom-redirections' ); ?></big></p> 
          
        </td>
        <td class="forsmalldropdowns" style="width:33%;padding:20px;">
            <p style="text-align:center;"><big><span style="font-size:36px;" class="dashicons dashicons-id"></span><br><br><?php esc_html_e( 'The uploader will be added in the edit account form and can only upload images in JPG or PNG format. ', 'wshk-custom-redirections' ); ?></big></p>
           
        </td>
    </tr>
    
    <tr>
        <td class="forsmalldropdowns" style="width:34%;padding:20px;">
           <p style="text-align:center;"><big><span style="font-size:36px;" class="dashicons dashicons-admin-media"></span><br><br><?php esc_html_e( 'All images will be saved on the site server, but are not displayed in the media library, helping to avoid deletion by mistake.', 'wshk-custom-redirections' ); ?></big></p>
        </td>
        <td class="forsmalldropdowns" style="width:33%;padding:20px;">
        <p style="text-align:center;"><big><span style="font-size:36px;" class="dashicons dashicons-code-standards"></span><br><br><?php esc_html_e( 'You can find easily where are located the custom avatar, just need to inspect each user avatar and follow the image URL.', 'wshk-custom-redirections' ); ?></big></p>    
        </td>
        <td class="forsmalldropdowns" style="width:33%;padding:20px;">
          <p style="text-align:center;"><big><span style="font-size:36px;" class="dashicons dashicons-format-gallery"></span><br><br><?php esc_html_e( 'If the user wants to upload a second avatar, the first one will be removed, helping to avoid overloading on your server.', 'wshk-custom-redirections' ); ?></big></p>
        </td>
    </tr>
</table>
<br><br>

<br><br>
<div class="forsmalldropdowns" style="padding:30px;">
<p><b>1.- <?php esc_html_e( 'Control the limit file size', 'wshk-custom-redirections' ); ?></b><br><small><?php esc_html_e( 'By default is limited to 200 KB, but you can control it easily using the predefined values, only need to choose one by sliding.', 'wshk-custom-redirections' ); ?></small> <br><small><em><?php esc_html_e( '(The file size limit will restrict uploading files with a larger size.)', 'wshk-custom-redirections' ); ?></em></small></p>


<br><br>
<style>
    /*input[name="numero"] { width: 100%; margin: 0; padding: 0; }*/
#numero-value { width: 100%; text-align: center; font-family: Arial, sans-serif; margin: 0; padding: 0; }

.slider {
  -webkit-appearance: none;
  appearance: none;
  width: 100%;
  height: 5px;
  background: #D3D3D3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
  border-radius:5px;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  background: #74689b;
  border-radius:50%;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #74689b !important;
  cursor: pointer;
  border-radius:50%;
}

.sliderticks {
  display: flex;
  justify-content: space-between;
  padding: 0 10px;
}

.sliderticks p {
  position: relative;
  display: flex;
  justify-content: center;
  text-align: center;
  width: 1px;
  background: #D3D3D3;
  height: 10px;
  line-height: 40px;
  margin: 10px 0px 20px 0px;
}

</style>
<script>
    function actualizar() {
        
        rango = document.getElementsByName('numero')[0];
        valor = rango.value;
        campo = document.getElementById('numero-value');
        if(valor === '1') {campo.innerHTML = '<div style="width:max-content;margin:auto;margin-left:0px;color:#aadb4a;border:1px solid #aadb4a;border-radius:5px;padding:10px;font-weight:bold;letter-spacing:1px;font-size:17px;"><?php echo esc_html_e( "OPTIMIZED", "wshk-custom-redirections" )?></div>';}
        else if(valor === '2') {campo.innerHTML = '<div style="width:max-content;margin:auto;color:orange;border:1px solid orange;border-radius:5px;padding:10px;font-weight:bold;letter-spacing:1px;font-size:17px;"><?php echo esc_html_e( "NORMAL", "wshk-custom-redirections" )?></div>';}
        else if(valor === '3') {campo.innerHTML = '<div style="width:max-content;margin:auto;margin-right:0px;color:red;border:1px solid red;border-radius:5px;padding:10px;font-weight:bold;letter-spacing:1px;font-size:17px;"><?php echo esc_html_e( "HIGH", "wshk-custom-redirections" )?></div>';}
        else { campo.innerHTML = '<div style="width:max-content;margin:auto;color:orange;border:1px solid orange;border-radius:5px;padding:10px;font-weight:bold;letter-spacing:1px;font-size:17px;"><?php echo esc_html_e( "NORMAL", "wshk-custom-redirections" )?></div>'; };
        //campo.innerHTML = valor;
        mycustomval = document.getElementById('wshk_myfilesizelimit').value = valor;
        
}

</script>
<input name="numero" type="range" min="1" max="3" list="marcas" class="slider" value="<?php if(get_option('wshk_myfilesizelimit')!=''){ echo get_option('wshk_myfilesizelimit'); } else { echo '2';}?>" step="1" onmousemove="actualizar();" />
    <datalist id="marcas">
        <option value="1" />
        <option value="2" />
        <option value="3" />
    </datalist>
    <div class="sliderticks">
    <p style="color:#aadb4a;">100kb</p>
    <p style="color:orange;">200kb</p>
    <p style="color:red;">1Mb</p>
    
  </div>
  <br><br>
    <div id="numero-value">
        <?php 
        
        
        
        if(get_option('wshk_myfilesizelimit')!=''){ 
            
            
        if(get_option('wshk_myfilesizelimit') === '1'){ echo '<div style="width:max-content;margin:auto;margin-left:0px;color:#aadb4a;border:1px solid #aadb4a;border-radius:5px;padding:10px;font-weight:bold;letter-spacing:1px;font-size:17px;">'. __( "OPTIMIZED", "wshk-custom-redirections" ) .'</div>';}
        else if(get_option('wshk_myfilesizelimit') === '2'){ echo '<div style="width:max-content;margin:auto;color:orange;border:1px solid orange;border-radius:5px;padding:10px;font-weight:bold;letter-spacing:1px;font-size:17px;">'. __( "NORMAL", "wshk-custom-redirections" ) .'</div>';}
        else if(get_option('wshk_myfilesizelimit') === '3'){ echo '<div style="width:max-content;margin:auto;margin-right:0px;color:red;border:1px solid red;border-radius:5px;padding:10px;font-weight:bold;letter-spacing:1px;font-size:17px;">'. __( "HIGH", "wshk-custom-redirections" ) .'</div>';}
        } else {
        
        echo '<div style="width:max-content;margin:auto;color:orange;border:1px solid orange;border-radius:5px;padding:10px;font-weight:bold;letter-spacing:1px;font-size:17px;">'. __( "NORMAL", "wshk-custom-redirections" ) .'</div>';}?>
    </div>
 
<p style="display:none;font-size: 16px;font-weight: 400;padding-bottom:15px;"> <span class="dashicons dashicons-nametag"></span> <?php esc_html_e( 'File size limit', 'wshk-custom-redirections' ); ?><br /><br /> <input class="testininputclass" type="text" name="wshk_myfilesizelimit" id="wshk_myfilesizelimit" value="<?php if(get_option('wshk_myfilesizelimit')!=''){ echo get_option('wshk_myfilesizelimit'); }?>" placeholder="" size="10" /></p>
</div>
    <br>
    <div class="forsmalldropdowns" style="padding:30px;">
<p><b>2.- <?php esc_html_e( 'Custom avatar shortcode compatibility', 'wshk-custom-redirections' ); ?></b><br><small><?php esc_html_e( 'If you are using the shortcode to display the customer avatar in your by default WooCommerce account page, you can decide if display or hide it while you are on the edit account tab.', 'wshk-custom-redirections' ); ?></small> <br><small><em><?php esc_html_e( 'Choosing the hide option, the avatar only will be hide while are on the edit account tab.', 'wshk-custom-redirections' ); ?></em></small></p>

    <p style="font-size: 16px;font-weight: 400;"><select  style="border: 1px solid #ddd !important;border-radius: 13px;padding: 10px; width: 400px !important; min-width: 400px; max-width: 400px;" name="wshk_displaycustavatartoo" id="wshk_displaycustavatartoo"> <option <?php if (get_option('wshk_displaycustavatartoo') == 'none') { ?>selected="true" <?php }; ?> value="none"><?php esc_html_e( 'Hide', 'wshk-custom-redirections' ); ?></option> <option <?php if (get_option('wshk_displaycustavatartoo') == 'block') { ?>selected="true" <?php }; ?> value="block"><?php esc_html_e( 'Show', 'wshk-custom-redirections' ); ?></option></select> <br /></p><br>
    </div>
    </div>
    
      <!-- END CUSTOMER AVATAR UPLOADER -->
          
          
          <div class="accordion elem">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enablecustomeravatarshortcode" name="wshk_enablecustomeravatarshortcode" value='18610302' <?php if(get_option('wshk_enablecustomeravatarshortcode')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablecustomeravatarshortcode></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Display customer avatar with a shortcode', 'wshk-custom-redirections' ); ?></big><br /><small> <?php esc_html_e( 'Just need activate it and copy the shortcode!', 'wshk-custom-redirections' ); ?></small></p></th></tr>
    </table>
</div>
<div class="panel">
<div style="width:96%;margin-top: 20px; margin-bottom: 15px;"><table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/display-customer-avatar-with-a-shortcode/" target="_blank" style="color: grey;"><span class="dashicons dashicons-format-video"></span> <?php esc_html_e( 'How work? ', 'wshk-custom-redirections' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/user-zone/#tab5" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'wshk-custom-redirections' ); ?></a></td></tr></table></div><br />

<br><br>
    <p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'The shortcode', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'You can use it on any page or post', 'woo-shortcodes-kit' ); ?></small></p>
<br><br><br>
    <div onmousedown="return false;" onselectstart="return false;" class="wshkshtboxes">
<table style="margin-top:-20px;">
          <colgroup>
    <col span="3">
   
  </colgroup>
         <tr>
        <td class="shtboxone" style="width: 25%; padding-left: 30px;"><p><big><strong><span class="dashicons dashicons-code-standards"></span> <?php esc_html_e( 'Shortcode:', 'woo-shortcodes-kit' ); ?></strong><br><input class="testininputclass" onmousedown="return false;" onselectstart="return false;" style="color:white;margin-top:10px;outline:0;-moz-outline: 0;border:none;" type="text" value="[woo_customer_avatar]" id="woocustomeravatarsht" readonly></big><br /><br /></p></td>
        
        <td class="shtboxtwo" style="width: 23%; padding-left: 30px;"><p><big>

<div class="tooltip" style="width:120px;">
<button class="wshkshtboxesbtn" style="width:150px;" type="button" onclick="myFunctioncustomeravatarsht()" onmouseout="outFuncustomeravatarsht()">
  <span class="tooltiptext" id="myTooltipcustomeravatarsht"><?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?></span>
  <?php esc_html_e( 'Copy shortcode', 'woo-shortcodes-kit' ); ?>
  </button>
</div>



<script>

document.getElementById("woocustomeravatarsht").addEventListener("mousedown", function(event){
  event.preventDefault();
});

function myFunctioncustomeravatarsht() {
  var copyText = document.getElementById("woocustomeravatarsht");
  copyText.select();
  document.execCommand("copy");
  
  var tooltipcustomeravatarsht = document.getElementById("myTooltipcustomeravatarsht");
  tooltipcustomeravatarsht.innerHTML = "<?php esc_html_e( 'Copied:', 'woo-shortcodes-kit' ); ?> " + copyText.value;
}

function outFuncustomeravatarsht() {
  var tooltipcustomeravatarsht = document.getElementById("myTooltipcustomeravatarsht");
  tooltipcustomeravatarsht.innerHTML = "<?php esc_html_e( 'Copy to Clipboard', 'woo-shortcodes-kit' ); ?>";
}
</script></big><br /><br /> </p></td>
        
        <td class="shtboxthree" style="width: 46%; padding-left: 30px;"><p><span class="dashicons dashicons-warning"></span><big style="font-size:14px !important;"><strong><?php esc_html_e( 'Copy the shortcode and paste in your custom page', 'woo-shortcodes-kit' ); ?></strong></big><br /><br /></p></td></tr>
        
        <br />
        <br />
        </table>
</div>
<br><br>
    <p><b>2.- <?php esc_html_e( 'The Style classes', 'wshk-custom-redirections' ); ?></b><br><small><?php esc_html_e( 'You can use it to apply custom CSS style', 'wshk-custom-redirections' ); ?></small></p>

<table width="100%">
    <tr>
        <td class="forsmalldropdowns" style="width:50%;">
        <p style="text-align:center;padding:0px 80px;"><big><br><br><b>p.wshkavatar</b><br><?php esc_html_e( 'Can control for example the align, using the style text-align.', 'wshk-custom-redirections' ); ?></big></p>    
        </td>
        <td class="forsmalldropdowns" style="width:50%;">
          <p style="text-align:center;padding:0px 80px;"><big><br><br><b>p.wshkavatar > img.avatar</b><br><?php esc_html_e( 'Can control for example the image size, usign the style width and height.', 'wshk-custom-redirections' ); ?></big>
        </td>
        
    </tr>
</table>
<br><br><br>
    </div>
    
    
    <!-- END CUSTOMER AVATAR SHORTCODE -->
    
    
    
    <div class="accordion elem">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
  <tr>
    <th><p><input type="checkbox" class="testininputclass" id="wshk_enablerestrictcategories" name="wshk_enablerestrictcategories" value='18710905' <?php if(get_option('wshk_enablerestrictcategories')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enablerestrictcategories></label><br /></th><th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"> <big><?php esc_html_e( 'Restrict access to WooCommerce products categories and redirect to shop', 'wshk-custom-redirections' ); ?></big><br /><small> <?php esc_html_e( 'Just need activate it and nothing more!', 'wshk-custom-redirections' ); ?></small></p></th></tr>
    </table>
</div>
<div class="panel">
<div style="width:96%;margin-top: 20px; margin-bottom: 15px;"><table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/restrict-access-to-woocommerce-products-categories-and-redirect-to-shop/" target="_blank" style="color: grey;"><span class="dashicons dashicons-format-video"></span> <?php esc_html_e( 'How work? ', 'wshk-custom-redirections' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/user-zone/#tab5" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'wshk-custom-redirections' ); ?></a></td></tr></table></div><br />
<br><br><br>
<table width="100%">
    <tr>
        <td class="forsmalldropdowns" style="width:34%;padding:20px;">
        <p style="text-align:center;"><big><span style="font-size:36px;" class="dashicons dashicons-hidden"></span><br><br><?php esc_html_e( 'Enabling this function, you will block the access to the WooCommerce products categories.', 'wshk-custom-redirections' ); ?></big></p>    
        </td>
        <td class="forsmalldropdowns" style="width:33%;padding:20px;">
          <p style="text-align:center;"><big><span style="font-size:36px;" class="dashicons dashicons-update-alt"></span><br><br><?php esc_html_e( 'If any user tries to access a product category, they will be redirected to the store page automatically.', 'wshk-custom-redirections' ); ?></big>
        </td>
        <td class="forsmalldropdowns" style="width:33%;padding:20px;">
           <p style="text-align:center;"><big><span style="font-size:36px;" class="dashicons dashicons-plugins-checked"></span><br><br><?php esc_html_e( 'It is ready to work also if you are using WSHK function Build a new shop page from scratch.', 'wshk-custom-redirections' ); ?></big> 
        </td>
    </tr>
</table>





    <br><br>
    </div>
    
      <!-- END RESTRICT ACCESS TO WC CATEGORIES -->
      
      
      <!-- TOTAL SALES AMOUNT BY PRODUCT CATEGORY-->
      
      
      <!-- Header -->
    <div class="accordion elem">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
    <tr>  
         <th><p><input type="checkbox" class="testininputclass" id="wshk_enableprototsalamocats" name="wshk_enableprototsalamocats" value='110420220' <?php if(get_option('wshk_enableprototsalamocats')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enableprototsalamocats></label><br /></th> <th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"><big><?php esc_html_e( 'Total sales amount by product category', 'wshk-custom-redirections' ); ?> <span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'NEW', 'wshk-custom-redirections' ); ?></span></big><br /><small><?php esc_html_e( 'Just need activate the function and copy the shortcode on any page or post!', 'wshk-custom-redirections' ); ?></small></p></th></tr>
         </table>
</div>
<!-- content -->
<div class="panel">
    <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/total-sales-amount-by-product-category/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'wshk-custom-redirections' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'wshk-custom-redirections' ); ?></a></td></tr></table>
    <br><br>
    <p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'The shortcode', 'woo-shortcodes-kit' ); ?></b><br><small><?php esc_html_e( 'You can use it on any page or post', 'wshk-custom-redirections' ); ?></small></p>
<br><br><br>
    <div onmousedown="return false;" onselectstart="return false;" class="wshkshtboxes">
<table style="margin-top:-20px;">
          <colgroup>
    <col span="3">
   
  </colgroup>
         <tr>
        <td class="shtboxone" style="width: 40%; padding-left: 30px;"><p><big><strong><span class="dashicons dashicons-code-standards"></span> <?php esc_html_e( 'Shortcode:', 'wshk-custom-redirections' ); ?></strong><br><input class="testininputclass" onmousedown="return false;" onselectstart="return false;" style="color:white;margin-top:10px;outline:0;-moz-outline: 0;border:none;" type="text" value="[woo_total_amount_bycat id='123']" id="woototsalamocats" readonly></big><br /><br /></p></td>
        
        <td class="shtboxtwo" style="width: 23%; padding-left: 30px;"><p><big>

<div class="tooltip" style="width:120px;">
<button class="wshkshtboxesbtn" style="width:150px;" type="button" onclick="myFunctiontotsalamocats()" onmouseout="outFunctotsalamocats()">
  <span class="tooltiptext" id="myTooltiptotsalamocats"><?php esc_html_e( 'Copy to Clipboard', 'wshk-custom-redirections' ); ?></span>
  <?php esc_html_e( 'Copy shortcode', 'wshk-custom-redirections' ); ?>
  </button>
</div>



<script>

document.getElementById("woototsalamocats").addEventListener("mousedown", function(event){
  event.preventDefault();
});

function myFunctiontotsalamocats() {
  var copyText = document.getElementById("woototsalamocats");
  copyText.select();
  document.execCommand("copy");
  
  var tooltiptotsalamocats = document.getElementById("myTooltiptotsalamocats");
  tooltiptotsalamocats.innerHTML = "<?php esc_html_e( 'Copied:', 'wshk-custom-redirections' ); ?> " + copyText.value;
}

function outFunctotsalamocats() {
  var tooltiptotsalamocats = document.getElementById("myTooltiptotsalamocats");
  tooltiptotsalamocats.innerHTML = "<?php esc_html_e( 'Copy to Clipboard', 'wshk-custom-redirections' ); ?>";
}
</script></big><br /><br /> </p></td>
        
        <td class="shtboxthree" style="width: 46%; padding-left: 30px;"><p><span class="dashicons dashicons-warning"></span><big style="font-size:14px !important;"><strong><?php esc_html_e( 'Copy the shortcode and paste in your custom post or page', 'wshk-custom-redirections' ); ?></strong></big><br /><br /></p></td></tr>
        
        <br />
        <br />
        </table>
</div>
<br><br>
        <p style="padding-left:30px;"><?php esc_html_e( 'You can use the shortcode where you want only need  to add the product category ID', 'wshk-custom-redirections' ); ?><strong> [woo_total_amount_bycat id="<?php esc_html_e( 'Here write the product category ID number', 'wshk-custom-redirections' ); ?>"]</strong></p>
        
        <br><br>
        </div>
      
      
      <!-- END TOTAL SALES AMOUNT BY PRODUCT CATEGORY-->
      
      
      <!-- TOTAL SALES COUNTER BY PRODUCT CATEGORY-->
      
      
      <!-- Header -->
    <div class="accordion elem">
  <table>
  <colgroup>
    <col span="2">
   
  </colgroup>
    <tr>  
         <th><p><input type="checkbox" class="testininputclass" id="wshk_enableprototsalcountcats" name="wshk_enableprototsalcountcats" value='130420220' <?php if(get_option('wshk_enableprototsalcountcats')!=''){ echo ' checked="checked"'; }?>/><label class="testintheclass" for=wshk_enableprototsalcountcats></label><br /></th> <th class="forcontainertitles" style="padding: 20px 20px 0px 20px;"><big><?php esc_html_e( 'Total sales counter by product category', 'wshk-custom-redirections' ); ?> <span style="background-color: #aadb4a; color: white;border:1px solid #aadb4a;border-radius:13px;padding:5px;text-transform: uppercase;font-size:10px;"><?php esc_html_e( 'NEW', 'wshk-custom-redirections' ); ?></span></big><br /><small><?php esc_html_e( 'Just need activate the function and copy the shortcode on any page or post!', 'wshk-custom-redirections' ); ?></small></p></th></tr>
         </table>
</div>
<!-- content -->
<div class="panel">
    <br><br>
    <table style="float:right;"><tr><td><a class="miraqueben" href="https://disespubli.com/docs/total-sales-counter-by-product-category/" target="_blank" style="color: grey;"><span class="dashicons dashicons-book"></span> <?php esc_html_e( 'How does it work? ', 'wshk-custom-redirections' ); ?> </a></td><td><a class="miraqueben" href="https://disespubli.com/wshk-features/#contact" class="botoneratopadmin" target="_blank" style="color:grey;"><span class="dashicons dashicons-sos"></span> <?php esc_html_e( 'Get help!', 'wshk-custom-redirections' ); ?></a></td></tr></table>
    <br><br>
    <p class="wshkfirststepfunc"><b>1.- <?php esc_html_e( 'The shortcode', 'wshk-custom-redirections' ); ?></b><br><small><?php esc_html_e( 'You can use it on any page or post', 'wshk-custom-redirections' ); ?></small></p>
<br><br><br>
    <div onmousedown="return false;" onselectstart="return false;" class="wshkshtboxes">
<table style="margin-top:-20px;">
          <colgroup>
    <col span="3">
   
  </colgroup>
         <tr>
        <td class="shtboxone" style="width: 40%; padding-left: 30px;"><p><big><strong><span class="dashicons dashicons-code-standards"></span> <?php esc_html_e( 'Shortcode:', 'wshk-custom-redirections' ); ?></strong><br><input class="testininputclass" onmousedown="return false;" onselectstart="return false;" style="color:white;margin-top:10px;outline:0;-moz-outline: 0;border:none;" type="text" value="[woo_total_sales_bycat_counter id='123']" id="woototsalcountcats" readonly></big><br /><br /></p></td>
        
        <td class="shtboxtwo" style="width: 23%; padding-left: 30px;"><p><big>

<div class="tooltip" style="width:120px;">
<button class="wshkshtboxesbtn" style="width:150px;" type="button" onclick="myFunctiontotsalcountcats()" onmouseout="outFunctotsalcountcats()">
  <span class="tooltiptext" id="myTooltiptotsalcountcats"><?php esc_html_e( 'Copy to Clipboard', 'wshk-custom-redirections' ); ?></span>
  <?php esc_html_e( 'Copy shortcode', 'wshk-custom-redirections' ); ?>
  </button>
</div>



<script>

document.getElementById("woototsalcountcats").addEventListener("mousedown", function(event){
  event.preventDefault();
});

function myFunctiontotsalcountcats() {
  var copyText = document.getElementById("woototsalcountcats");
  copyText.select();
  document.execCommand("copy");
  
  var tooltiptotsalcountcats = document.getElementById("myTooltiptotsalcountcats");
  tooltiptotsalcountcats.innerHTML = "<?php esc_html_e( 'Copied:', 'wshk-custom-redirections' ); ?> " + copyText.value;
}

function outFunctotsalcountcats() {
  var tooltiptotsalcountcats = document.getElementById("myTooltiptotsalcountcats");
  tooltiptotsalcountcats.innerHTML = "<?php esc_html_e( 'Copy to Clipboard', 'wshk-custom-redirections' ); ?>";
}
</script></big><br /><br /> </p></td>
        
        <td class="shtboxthree" style="width: 46%; padding-left: 30px;"><p><span class="dashicons dashicons-warning"></span><big style="font-size:14px !important;"><strong><?php esc_html_e( 'Copy the shortcode and paste in your custom post or page', 'wshk-custom-redirections' ); ?></strong></big><br /><br /></p></td></tr>
        
        <br />
        <br />
        </table>
</div>
<br><br>
        <p style="padding-left:30px;"><?php esc_html_e( 'You can use the shortcode where you want only need  to add the product category ID', 'wshk-custom-redirections' ); ?><strong> [woo_total_sales_bycat_counter id="<?php esc_html_e( 'Here write the product category ID number', 'wshk-custom-redirections' ); ?>"]</strong></p>
        
        <br><br>
        </div>
      
      
      <!-- END TOTAL SALES AMOUNT BY PRODUCT CATEGORY-->
        
    
     <br><br>
      </div>
    </li>
    
    <!-- END WSHK PRO SETTINGS SECTION -->
    
    
    <?php
} else { 
    $siteurlemab = get_site_url();
    ?>
    
    <li>
     <style>.actwshkpro:before {display:none;}</style>
       <a onclick="location.href='<?php echo $siteurlemab; ?>/wp-admin/admin.php?page=custom-redirections-for-wshk';"><div class="acc_ctrl actwshkpro" style="background-color: #fbfbfb; padding: 10px;"><h3 class="wshksettitles" style="margin-top: 25px;padding-left:20px;color:#a46497;letter-spacing: 1px; font-size: 20px;"><span class="dashicons dashicons-admin-network"></span> <?php esc_html_e( 'ADD YOUR LICENCE FOR ACTIVATE THE ADDON FUNCTIONS', 'wshk-custom-redirections' ); ?></h3><span style="text-align: center; width: 100px; border: 1px solid #60329b; border-radius: 13px; background-color: #60329b; font-size: 18px; font-weight: bolder; color: white; padding: 15px;display:block;float:right;margin-top: -60px;">PREMIUM</span></div></a>
       
       </li>
       <?php }