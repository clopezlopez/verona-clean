<?php 

namespace Elementor;

class Wshk_Widget_8 extends Widget_Base {
	
	public function get_name() {
		return 'wshk-logout';
	}
	
	public function get_title() {
		return 'Logout button';
	}
	
	public function get_icon() {
		return 'eicon-button';
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
    $customlogoutredi = get_option('wshk_btnlogoutredi');
    $customlogoutbtntext = get_option('wshk_logbtntext');
    $customlogoutbtnwidth = get_option('wshk_logbtnwd');

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
			'wshk_logbtntext',
			[
				'label' => __( 'Button text', 'woo-shortcodes-kit' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => $customlogoutbtntext,
				'description' => __('By default the button not have any text.','woo-shortcodes-kit'),
				
				
			]
		);
		
		
		$this->add_control(
			'wshk_logbtnta',
			[
				'label' => __( 'Button text alignment', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::CHOOSE,
				'options' => [
				    
				    ''    => [
						'title' => __( 'None', 'elementor' ),
						'icon' => 'fa fa-eraser',
					],
				    
					'left'    => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'elementor' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				//'prefix_class' => 'elementor%s-align-',
				'default' => '',
				
			]
		);
		
		
		
		$this->add_control(
			'wshk_logbtnwd',
			[
				'label' => __( 'Button width (in PX)', 'woo-shortcodes-kit' ),
				'label_block' => true,
				'type' => Controls_Manager::NUMBER,
				'placeholder' => $customlogoutbtnwidth,
				'default' => '',
				'separator' => 'after',
				
				
			]
		);
		
		
		
		$this->add_control(
			'wshk_btnlogoutredi',
			[
				'label' => __( 'Redirect after logout', 'plugin-domain' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::SELECT2,
				'default' => '',
				'multiple' => false,
				'options' => $this->wshk_get_pages_logout(),
				'description' => __('After logout the user will be redirected to the selected page. The admin will be redirected too the same selected page.', 'wshk-custom-redirections'),
				
				
			]
		);
		
		
		
		

		/*$this->add_control(
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
	
	
	private function wshk_get_pages_logout() {
	    
	   $pages = get_pages();
	$itemswshk = array();
	$i     = 0;
	foreach ( $pages as $page ) {
		if ( $i == 0 ) {
			$default = $page->post_name;
			$i ++;
		}
		$itemswshk[ $page->post_name ] = $page->post_title;
	}

	return $itemswshk;
	    
	    
	}
	
	protected function render() {
	    
	    global $pluginOptionsVal;
	    $pluginOptionsVal=get_wshk_sidebar_options();
        $settings = $this->get_settings_for_display();
        
        //$url = $settings['link']['url'];
        
        if (!empty($settings['wshk_btnlogoutredi']) ) {
            
            update_option( 'wshk_btnlogoutredi', $settings['wshk_btnlogoutredi'] );
            
        }else {
            
            $settings['wshk_btnlogoutredi'] = get_option('wshk_btnlogoutredi');
            
            update_option( $settings['wshk_btnlogoutredi'], get_option('wshk_btnlogoutredi') );
        }
        
        
        if (!empty($settings['wshk_logbtntext']) ) {
            
            update_option( 'wshk_logbtntext', $settings['wshk_logbtntext'] );
            
        }else {
            
            $settings['wshk_logbtntext'] = get_option('wshk_logbtntext');
            
            update_option( $settings['wshk_logbtntext'], get_option('wshk_logbtntext') );
        }
        
        
        if (!empty($settings['wshk_logbtnta']) ) {
            
            update_option( 'wshk_logbtnta', $settings['wshk_logbtnta'] );
            
        }else {
            
            $settings['wshk_logbtnta'] = get_option('wshk_logbtnta');
            
            update_option( $settings['wshk_logbtnta'], get_option('wshk_logbtnta') );
        }
        
        if (!empty($settings['wshk_logbtnwd']) ) {
            
            update_option( 'wshk_logbtnwd', $settings['wshk_logbtnwd'] );
            
        }else {
            
            $settings['wshk_logbtnwd'] = get_option('wshk_logbtnwd');
            
            update_option( $settings['wshk_logbtnwd'], get_option('wshk_logbtnwd') );
        }
		//echo  "<a href='$url'><div class='title'>$settings[title]</div> <div class='subtitle'>$settings[subtitle]</div></a>";
		 echo "[woo_logout_button]";

	}
	
	protected function _content_template() {
	    
	   

    }
	
	
}