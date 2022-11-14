<?php

class Wshk_Elementor_Widgets {

	protected static $instance = null;

	public static function get_instance() {
		if ( ! isset( static::$instance ) ) {
			static::$instance = new static;
		}

		return static::$instance;
	}

	protected function __construct() {
		require_once('widgets/widget1.php');
		require_once('widgets/widget2.php');
		require_once('widgets/widget3.php');
		require_once('widgets/widget4.php');
		require_once('widgets/widget5.php');
		/*require_once('widgets/widget6.php');*/
		require_once('widgets/widget7.php');
		require_once('widgets/widget8.php');
		require_once('widgets/widget9.php');
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}

	public function register_widgets() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Wshk_Widget_1() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Wshk_Widget_2() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Wshk_Widget_3() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Wshk_Widget_4() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Wshk_Widget_5() );
		/*\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Wshk_Widget_6() );*/
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Wshk_Widget_7() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Wshk_Widget_8() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Custom_Redirections_For_Wshk\Wshk_Widget_9() );
	}

}

add_action( 'init', 'wshk_elementor_init' );
function wshk_elementor_init() {
	Wshk_Elementor_Widgets::get_instance();
	include 'classes/Helper.php';
	
}