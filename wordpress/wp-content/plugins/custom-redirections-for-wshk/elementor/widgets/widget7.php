<?php 

namespace Elementor;

class Wshk_Widget_7 extends Widget_Base {
	
	public function get_name() {
		return 'wshk-login';
	}
	
	public function get_title() {
		return 'Login form';
	}
	
	public function get_icon() {
		return 'eicon-lock-user';
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
    $customloginredi = get_option('wshk_loginredi');
    
     
    

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
			'wshk_loginredi',
			[
				'label' => __( 'Redirect after login', 'plugin-domain' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::SELECT2,
				'default' => '',
				'multiple' => false,
				'options' => $this->wshk_get_pages(),
				'description' => __('After login the user will be redirected to the selected page. The admin will be redirected to the backend.', 'wshk-custom-redirections'),
				
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
	
	
	private function wshk_get_pages() {
	    
	   $pages = get_pages();
	$items = array();
	$i     = 0;
	foreach ( $pages as $page ) {
		if ( $i == 0 ) {
			$default = $page->post_name;
			$i ++;
		}
		$items[ $page->post_name ] = $page->post_title;
	}

	return $items;
	    
	    
	}

	
	
	
	protected function render() {
	    
	    global $pluginOptionsVal;
	    $pluginOptionsVal=get_wshk_sidebar_options();
        $settings = $this->get_settings_for_display();
        //$url = $settings['link']['url'];
        
        
        if (!empty($settings['wshk_loginredi']) ) {
            
            update_option( 'wshk_loginredi', $settings['wshk_loginredi'] );
            
        }else {
            
            $settings['wshk_loginredi'] = get_option('wshk_loginredi');
            
            update_option( $settings['wshk_loginredi'], get_option('wshk_loginredi') );
        }
        
		//echo  "<a href='$url'><div class='title'>$settings[title]</div> <div class='subtitle'>$settings[subtitle]</div></a>";
		 echo "[woo_login_form]";

	}
	
	protected function _content_template() {

    }
	
	
}