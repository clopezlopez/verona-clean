<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class Custom_Blocks_Elementor
 */
class Custom_Blocks_Elementor {


	private static $instance = null;

	/**
	 * @return Custom_Blocks_Elementor|null
	 */
	public static function get_instance() {
		if ( ! self::$instance )
			self::$instance = new self;
		return self::$instance;
	}

	public function init() {
		if ( ! defined( 'ELEMENTOR_CBAR_PATH' ) ) {
			return;
		}

		// Add section for settings
		add_action('elementor/element/common/_section_style/after_section_end', [ $this, 'register_section' ] );
		add_action('elementor/element/section/section_advanced/after_section_end', [ $this, 'register_section' ] );

		add_action( 'elementor/element/common/cbar_section/before_section_end', [ $this, 'register_controls' ], 10, 2 );
		add_action( 'elementor/element/section/cbar_section/before_section_end', [ $this, 'register_controls' ], 10, 2 );

		add_filter('elementor/widget/render_content', [ $this, 'content_change' ], 999, 2 );
		add_filter('elementor/section/render_content', [ $this, 'content_change' ], 999, 2 );

		add_filter( 'elementor/frontend/section/should_render', [ $this, 'section_should_render' ] , 10, 2 );
		add_filter( 'elementor/frontend/widget/should_render', [ $this, 'section_should_render' ] , 10, 2 );
		add_filter( 'elementor/frontend/repeater/should_render', [ $this, 'section_should_render' ] , 10, 2 );

	}

	public function register_section( $element ) {
		$element->start_controls_section(
			'cbar_section',
			[
				'tab' 	=> Controls_Manager::TAB_ADVANCED,
				'label' => __( 'Custom Blocks', 'wshk-custom-redirections' ),
			]
		);
		$element->end_controls_section();
	}

	/**
	 * @param $element \Elementor\Widget_Base
	 * @param $section_id
	 * @param $args
	 */
	public function register_controls( $element, $args ) {

		$element->add_control(
			'cbar_enabled', [
				'label' => __('Enable Custom Blocks', 'wshk-custom-redirections'),
				'type' => Controls_Manager::SWITCHER,
				'default' => '',
				'label_on' => __('Yes', 'wshk-custom-redirections'),
				'label_off' => __('No', 'wshk-custom-redirections'),
				'return_value' => 'yes',
			]
		);

		$element->add_control(
			'cbar_role_visible',
			[
				'type' => Controls_Manager::SELECT2,
				'label' => __( 'Visible for:', 'wshk-custom-redirections' ),
				'options' => $this->get_roles(),
				'default' => [],
				'multiple' => true,
				'label_block' => true,
				'condition' => [
					'cbar_enabled' => 'yes',
					/*'cbar_role_hidden' => [],*/
				],
			]
		);

		$element->add_control(
			'cbar_role_hidden',
			[
				'type' => Controls_Manager::SELECT2,
				'label' => __( 'Hidden for:', 'wshk-custom-redirections' ),
				'options' => $this->get_roles(),
				'default' => [],
				'multiple' => true,
				'label_block' => true,
				'condition' => [
					'cbar_enabled' => 'yes',
					/*'cbar_role_visible' => [],*/
				],
			]
		);

	}

	private function get_roles() {
		global $wp_roles;

		if ( ! isset( $wp_roles ) ) {
			$wp_roles = new \WP_Roles();
		}
		$all_roles = $wp_roles->roles;
		//$editable_roles = apply_filters('editable_roles', $all_roles);

		//$data = [ 'cbar-guest' => 'Guests', 'cbar-user' => 'Logged in users' ];
		$data = [ 'cbar-user' => 'Logged in users' ];

		/*foreach ( $editable_roles as $k => $role ) {
			$data[$k] = $role['name'];
		}*/

		return $data;
	}


	/**
	 * @param string $content
	 * @param $widget \Elementor\Widget_Base
	 * @return string
	 */
	public function content_change( $content, $widget ) {

		if (Plugin::$instance->editor->is_edit_mode() ) {
			return $content;
		}

		// Get the settings
		$settings = $widget->get_settings();

		if ( ! $this->should_render( $settings ) ) {
			return '';
		}

		return $content;

	}

	public function section_should_render( $should_render, $section ) {
		// Get the settings
		$settings = $section->get_settings();

		if ( ! $this->should_render( $settings ) ) {
			return false;
		}

		return $should_render;

	}

	private function should_render( $settings ) {
		$user_state = is_user_logged_in();

		if( $settings['cbar_enabled'] == 'yes' ) {

			//visible for
			if( ! empty( $settings['cbar_role_visible'] ) ) {
				if ( in_array( 'cbar-guest', $settings['cbar_role_visible'] ) ) {
					if ( $user_state == true ) {
						return false;
					}
				} elseif ( in_array( 'cbar-user', $settings['cbar_role_visible'] ) ) {
					if ( $user_state == false) {
						return false;
					}
				} else {
					if ( $user_state == false ) {
						return false;
					}
					$user = wp_get_current_user();

					$has_role = false;
					foreach ( $settings['cbar_role_visible'] as $setting ) {
						if ( in_array( $setting, (array) $user->roles ) ) {
							$has_role = true;
						}
					}
					if ( $has_role === false ) {
						return false;
					}
				}

			}
			//hidden for
			elseif( ! empty( $settings['cbar_role_hidden'] ) ) {

				if ( in_array( 'cbar-guest', $settings['cbar_role_hidden'] ) ) {

					if ( $user_state == false) {
						return false;
					}
				} elseif ( in_array( 'cbar-user', $settings['cbar_role_hidden'] ) ) {
					if ( $user_state == true) {
						return false;
					}
				} else {
					if ( $user_state == false ) {
						return true;
					}
					$user = wp_get_current_user();

					foreach ( $settings['cbar_role_hidden'] as $setting ) {
						if ( in_array( $setting, (array) $user->roles ) ) {
							return false;
						}
					}
				}
			}
		}

		return true;
	}


}

Custom_Blocks_Elementor::get_instance()->init();