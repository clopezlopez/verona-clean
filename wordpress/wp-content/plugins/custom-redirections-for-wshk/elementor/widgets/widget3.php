<?php 

namespace Elementor;

class Wshk_Widget_3 extends Widget_Base {
	
	public function get_name() {
		return 'billing-and-shipping';
	}
	
	public function get_title() {
		return 'Billing and Shipping';
	}
	
	public function get_icon() {
		return 'eicon-google-maps';
	}
	
	
	
	public function get_categories() {
		return [ 'WSHK' ];
	}
	
	protected function _register_controls() {
	    
	    global $pluginOptionsVal;
    
    $pluginOptionsVal=get_wshk_sidebar_options();
    $siteurlemab = get_site_url();
    $wshkpanellink = __( 'configuration panel', 'wshk-custom-redirections' );
    //$numeropedidos = get_option('wshk_numeropedidos');
    $customaddressesredi = get_option('wshk_miaddressesid');
	    

		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Settings', 'elementor' ),
			]
		);
		
		
		$this->add_control(
			'important_note',
			[
				//'label' => __( 'Important Note', 'wshk-custom-redirections' ),
				//'label_block' => true,
				'type' => \Elementor\Controls_Manager::RAW_HTML,
				'raw' => '<br><div style="background-color:#f7f7f7;padding:20px;"><p style="font-size:12px;"><i class="fa fa-info-circle" aria-hidden="true"></i> '.__( 'Important', 'wshk-custom-redirections' ).'</p><br><small>'.__( 'You can control the options from here or the configuration panel, but if you have configured any option from here, you must leave it blank in order to manage it from the ', 'woo-shortcodes-kit' ).'<a href="'.$siteurlemab.'/wp-admin/admin.php?page=woo-shortcodes-kit" target="_blank">'.$wshkpanellink.'</a></small></div><br>',
				'content_classes' => 'your-class',
				'separator' => 'none',
			]
		);
		
		$this->add_control(
			'wshk_miaddressesid',
			[
				'label' => __( 'Custom redirection to tab', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => $customaddressesredi,
				'description' => __('If the user do click on the edit button, it will display the form to edit the address redirecting to the same tab, just need to add the tab slug. Ex: #tab3.','woo-shortcodes-kit'),
				
			]
		);
		
		/*$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'elementor' ),
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label' => __( 'Sub-title', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your sub-title', 'elementor' ),
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'elementor' ),
				'default' => [
					'url' => '',
				]
			]
		);*/

		$this->end_controls_section();
	}
	
	protected function render() {
	    
	    global $pluginOptionsVal;
	    $pluginOptionsVal=get_wshk_sidebar_options();
        $settings = $this->get_settings_for_display();
        
        //$url = $settings['link']['url'];
        
        if (!empty($settings['wshk_miaddressesid']) ) {
            
            update_option( 'wshk_miaddressesid', $settings['wshk_miaddressesid'] );
            
        }else {
            
            $settings['wshk_miaddressesid'] = get_option('wshk_miaddressesid');
            
            update_option( $settings['wshk_miaddressesid'], get_option('wshk_miaddressesid') );
        }
        
		//echo  "<a href='$url'><div class='title'>$settings[title]</div> <div class='subtitle'>$settings[subtitle]</div></a>";
		 echo "[woo_myaddress]";

	}
	
	protected function _content_template() {
	   

    }
	
	
}