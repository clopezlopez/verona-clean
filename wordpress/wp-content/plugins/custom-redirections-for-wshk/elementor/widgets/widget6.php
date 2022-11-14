<?php 

namespace Elementor;

class Wshk_Widget_6 extends Widget_Base {
	
	public function get_name() {
		return 'wshk-dashboard';
	}
	
	public function get_title() {
		return 'Dashboard';
	}
	
	public function get_icon() {
		return 'eicon-dashboard';
	}
	
	
	
	public function get_categories() {
		return [ 'WSHK' ];
	}
	
	protected function _register_controls() {

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
				'raw' => '<br><div style="background-color:#f7f7f7;padding:20px;"><p style="font-size:12px;"><i class="fa fa-info-circle" aria-hidden="true"></i> '.__( 'Important', 'wshk-custom-redirections' ).'</p><br><small>'.__( 'This element dont have advanced options to configure.', 'woo-shortcodes-kit' ).'</small></div><br>',
				'content_classes' => 'your-class',
				'separator' => 'none',
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

        $settings = $this->get_settings_for_display();
        //$url = $settings['link']['url'];
		//echo  "<a href='$url'><div class='title'>$settings[title]</div> <div class='subtitle'>$settings[subtitle]</div></a>";
		 echo "[woo_mydashboard]";

	}
	
	protected function _content_template() {

    }
	
	
}