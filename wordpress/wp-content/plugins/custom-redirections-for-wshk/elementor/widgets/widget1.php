<?php
namespace Elementor;

class Wshk_Widget_1 extends Widget_Base {
	
	public function get_name() {
		return 'orders-list';
	}
	
	public function get_title() {
		return 'Orders list';
	}
	
	public function get_icon() {
		return 'eicon-cart-light';
	}
	
	
	
	public function get_categories() {
		return [ 'WSHK' ];
	}
	
	protected function _register_controls() {
	    
        //global $pluginOptionsVal;
    
    //$pluginOptionsVal=get_wshk_sidebar_options();
    $siteurlemab = get_site_url();
    $wshkpanellink = __( 'configuration panel', 'wshk-custom-redirections' );
    $numeropedidos = get_option('wshk_numeropedidosnew');
    $customordersredi = get_option('wshk_vieworderid');


		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Settings', 'elementor' ),
			]
		);
		
		
		/*$this->add_control(
			'title',
			[
				'label' => __( 'Orders list shortcode', 'wshk-custom-redirections' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
				//'separator' => 'after',
				
			]
		);*/

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
			'wshk_numeropedidosnew',
			[
				'label' => __( 'Orders to display', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::NUMBER,
				'placeholder' => $numeropedidos,
				'description' => __('When the user has placed more orders than the established number, the pagination will appear below the table to navigate among the previous orders.','woo-shortcodes-kit'),
				'separator' => 'after',
				
			]
		);
		
		
		$this->add_control(
			'wshk_vieworderid',
			[
				'label' => __( 'Custom redirection to tab', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => $customordersredi,
				'description' => __('If the user do click on the view button, it will display the orders details redirecting to the same tab, just need to add the tab slug. Ex: #tab2.','woo-shortcodes-kit'),
				
			]
		);

		/*$this->add_control(
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

//$numeropedidos = get_option('wshk_numeropedidos');

$pluginOptionsVal=get_wshk_sidebar_options();
        $settings = $this->get_settings_for_display();
      
        //$url = $settings['link']['url'];
        if (!empty($settings['wshk_numeropedidosnew']) ) {
            
            update_option( 'wshk_numeropedidosnew', $settings['wshk_numeropedidosnew'] );
            
        }else {
            
            $settings['wshk_numeropedidosnew'] = get_option('wshk_numeropedidosnew');
            
            update_option( $settings['wshk_numeropedidosnew'], get_option('wshk_numeropedidosnew') );
        }
        
        if (!empty($settings['wshk_vieworderid']) ) {
            
            update_option( 'wshk_vieworderid', $settings['wshk_vieworderid'] );
            
        }else {
            
            $settings['wshk_vieworderid'] = get_option('wshk_vieworderid');
            
            update_option( $settings['wshk_vieworderid'], get_option('wshk_vieworderid') );
        }
        
		//echo  "<a href='$url'><div class='title'>$settings[title]</div> <div class='subtitle'>$settings[subtitle]</div></a>";
		 echo "[woo_myorders]";

	}
	
	protected function _content_template() {

    }
	
	
}