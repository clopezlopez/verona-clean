<?php

namespace Custom_Redirections_For_Wshk;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Plugin;
use Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Widget_Base;
use \Custom_Redirections_For_Wshk\Classes\Helper;


class Wshk_Widget_9 extends Widget_Base
{
    public function get_name()
    {
        return 'wshk-adv-tabs';
    }

    public function get_title()
    {
        return esc_html__('Advanced Tabs', 'wshk-custom-redirections');
    }

    public function get_icon()
    {
        return 'eicon-tabs';
    }

    public function get_categories()
    {
        return ['WSHK'];
    }

    public function get_keywords()
    {
        return [
            'tab',
            'tabs',
            'advanced tabs',
            'panel',
            'navigation',
            'group',
            'tabs content',
            'product tabs',
            'wshk',
        ];
    }
    
    
    protected function _register_controls()
    {
        /**
         * Advance Tabs Settings
         */
        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Settings', 'wshk-custom-redirections'),
            ]
        );
        
        
        $this->add_control(
            'wshk_adv_tab_layout',//wshk option
            [
                'label' => esc_html__('Layout', 'wshk-custom-redirections'),
                'type' => Controls_Manager::SELECT,
                'default' => 'wshk-tabs-horizontal',
                'label_block' => false,
                'options' => [
                    'wshk-tabs-horizontal' => esc_html__('Horizontal', 'wshk-custom-redirections'),
                    'wshk-tabs-vertical' => esc_html__('Vertical', 'wshk-custom-redirections'),
                ],
            ]
        );
        
        $this->add_control(
            'wshk_adv_tabs_icon_show',//wshk option
            [
                'label' => esc_html__('Enable Icon', 'wshk-custom-redirections'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'return_value' => 'yes',
            ]
        );
        
        $this->add_control(
            'wshk_adv_tab_icon_position',//wshk option
            [
                'label' => esc_html__('Icon Position', 'wshk-custom-redirections'),
                'type' => Controls_Manager::SELECT,
                'default' => 'wshk-tab-inline-icon',
                'label_block' => false,
                'options' => [
                    'wshk-tab-top-icon' => esc_html__('Stacked', 'wshk-custom-redirections'),
                    'wshk-tab-inline-icon' => esc_html__('Inline', 'wshk-custom-redirections'),
                ],
                'condition' => [
                    'wshk_adv_tabs_icon_show' => 'yes',
                ],
            ]
        );
        
        $this->add_control(
            'wshk_adv_tabs_linkeable_tabs',//wshk option
            [
                'label' => esc_html__('Linkeable Tabs', 'wshk-custom-redirections'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'return_value' => 'yes',
            ]
        );
        
        $this->add_control(
			'important_note_linkeables',
			[
				//'label' => __( 'Important Note', 'wshk-custom-redirections' ),
				//'label_block' => true,
				'type' => \Elementor\Controls_Manager::RAW_HTML,
				'raw' => '<br><div style="background-color:#f7f7f7;padding:20px;"><p style="font-size:12px;"><i class="fa fa-info-circle" aria-hidden="true"></i> '.__( 'Important', 'wshk-custom-redirections' ).'</p><br><small>'.__( 'Activating this option, the tabs will get a slug and will can be linkeables from the same page using your custom links and from external pages too.', 'wshk-custom-redirections' ).'</small></div><br>',
				'content_classes' => 'your-class',
				'separator' => 'none',
			]
		);
        
        $this->end_controls_section();
        
        
        
        /**
         * Advance Tabs Content Settings
         */
        $this->start_controls_section(
            'wshk_section_adv_tabs_content_settings',
            [
                'label' => esc_html__('Content', 'wshk-custom-redirections'),
            ]
        );
        
        
        $repeater = new Repeater();

        $repeater->add_control(
            'wshk_adv_tabs_tab_show_as_default',//wshk option
            [
                'label' => __('Set as Default', 'wshk-custom-redirections'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'inactive',
                'return_value' => 'active-default',
            ]
        );
        
        
        $repeater->add_control(
            'wshk_adv_tabs_icon_type',//wshk option
            [
                'label' => esc_html__('Icon Type', 'wshk-custom-redirections'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'none' => [
                        'title' => esc_html__('None', 'wshk-custom-redirections'),
                        'icon' => 'fa fa-ban',
                    ],
                    'icon' => [
                        'title' => esc_html__('Icon', 'wshk-custom-redirections'),
                        'icon' => 'fa fa-gear',
                    ],
                    'image' => [
                        'title' => esc_html__('Image', 'wshk-custom-redirections'),
                        'icon' => 'fa fa-picture-o',
                    ],
                ],
                'default' => 'icon',
            ]
        );
        
        
        $repeater->add_control(
            'wshk_adv_tabs_tab_title_icon_new',//wshk option
            [
                'label' => esc_html__('Icon', 'wshk-custom-redirections'),
                'type' => Controls_Manager::ICONS,
                'fa4compatibility' => 'wshk_adv_tabs_tab_title_icon',
                'default' => [
                    'value' => 'fas fa-home',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'wshk_adv_tabs_icon_type' => 'icon',
                ],
            ]
        );
        
        
        $repeater->add_control(
            'wshk_adv_tabs_tab_title_image',//wshk option
            [
                'label' => esc_html__('Image', 'wshk-custom-redirections'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'wshk_adv_tabs_icon_type' => 'image',
                ],
            ]
        );
        
        
        $repeater->add_control(
            'wshk_adv_tabs_tab_title',//wshk option
            [
                'name' => 'wshk_adv_tabs_tab_title',
                'label' => esc_html__('Tab Title', 'wshk-custom-redirections'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Tab Title', 'wshk-custom-redirections'),
                'dynamic' => ['active' => true],
            ]
        );
        
        //testtt
        /*$repeater->add_control(
            'wshk_adv_tabs_tab_id',//wshk option
            [
                'name' => 'wshk_adv_tabs_tab_id',
                'label' => esc_html__('Tab ID', 'wshk-custom-redirections'),
                'type' => Controls_Manager::TEXT,
                'default' => '',//esc_html__('Tab ID', 'wshk-custom-redirections'),
                'dynamic' => ['active' => true],
            ]
        );*/
        
        
        $repeater->add_control(
            'wshk_adv_tabs_text_type',//wshk option
            [
                'label' => __('Content Type', 'wshk-custom-redirections'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'content' => __('Content', 'wshk-custom-redirections'),
                    'template' => __('Saved Templates', 'wshk-custom-redirections'),
                ],
                'default' => 'content',
            ]
        );
        
        
        $repeater->add_control(
            'wshk_primary_templates',//wshk option
            [
                'label' => __('Choose Template', 'wshk-custom-redirections'),
                'type' => Controls_Manager::SELECT,
                'options' => Helper::get_elementor_templates(),
                'condition' => [
                    'wshk_adv_tabs_text_type' => 'template',
                ],
            ]
        );
        
        
        $repeater->add_control(
            'wshk_adv_tabs_tab_content',//wshk option
            [
                'label' => esc_html__('Tab Content', 'wshk-custom-redirections'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, neque qui velit. Magni dolorum quidem ipsam eligendi, totam, facilis laudantium cum accusamus ullam voluptatibus commodi numquam, error, est. Ea, consequatur.', 'wshk-custom-redirections'),
                'dynamic' => ['active' => true],
                'condition' => [
                    'wshk_adv_tabs_text_type' => 'content',
                ],
            ]
        );
        
        
        $this->add_control(
            'wshk_adv_tabs_tab',//wshk option
            [
                'type' => Controls_Manager::REPEATER,
                'seperator' => 'before',
                'default' => [
                    ['wshk_adv_tabs_tab_title' => esc_html__('Orders list', 'wshk-custom-redirections')],
                    ['wshk_adv_tabs_tab_title' => esc_html__('Downloads list', 'wshk-custom-redirections')],
                    ['wshk_adv_tabs_tab_title' => esc_html__('Addresses', 'wshk-custom-redirections')],
                    ['wshk_adv_tabs_tab_title' => esc_html__('Payment methods', 'wshk-custom-redirections')],
                    ['wshk_adv_tabs_tab_title' => esc_html__('Edit account', 'wshk-custom-redirections')],
                    ['wshk_adv_tabs_tab_title' => esc_html__('Logout', 'wshk-custom-redirections')],
                    
                ],
                'fields' => $repeater->get_controls(),
                'title_field' => '{{wshk_adv_tabs_tab_title}}',
            ]
        );
        $this->end_controls_section();
        
        
        
        
        
         /**
         * -------------------------------------------
         * Tab Style Advance Tabs General Style
         * -------------------------------------------
         */
        $this->start_controls_section(
            'wshk_section_adv_tabs_style_settings',
            [
                'label' => esc_html__('General', 'wshk-custom-redirections'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        
        
        $this->add_responsive_control(
            'wshk_adv_tabs_padding',//wshk option
            [
                'label' => esc_html__('Padding', 'wshk-custom-redirections'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wshk-advance-tabs' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        
        $this->add_responsive_control(
            'wshk_adv_tabs_margin',//wshk option
            [
                'label' => esc_html__('Margin', 'wshk-custom-redirections'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wshk-advance-tabs' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'wshk_adv_tabs_border',
                'label' => esc_html__('Border', 'wshk-custom-redirections'),
                'selector' => '{{WRAPPER}} .wshk-advance-tabs',
            ]
        );
        
        
        $this->add_responsive_control(
            'wshk_adv_tabs_border_radius',//wshk option
            [
                'label' => esc_html__('Border Radius', 'wshk-custom-redirections'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wshk-advance-tabs' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wshk_adv_tabs_box_shadow',
                'selector' => '{{WRAPPER}} .wshk-advance-tabs',
            ]
        );
        $this->end_controls_section();
        
        
        
        
        
         /**
         * -------------------------------------------
         * Tab Style Advance Tabs Content Style
         * -------------------------------------------
         */
        $this->start_controls_section(
            'wshk_section_adv_tabs_tab_style_settings',
            [
                'label' => esc_html__('Tab Title', 'wshk-custom-redirections'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'wshk_adv_tabs_title_tabs_hide',//wshk option
            [
                'label' => esc_html__('Hide Tabs', 'wshk-custom-redirections'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'return_value' => 'yes',
            ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'wshk_adv_tabs_tab_title_typography',
                'selector' => '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li',
            ]
        );
        
        
        $this->add_responsive_control(
            'wshk_adv_tabs_title_width',//wshk option
            [
                'label' => __('Title Min Width', 'wshk-custom-redirections'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .wshk-advance-tabs.wshk-tabs-vertical > .wshk-tabs-nav > ul' => 'min-width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'wshk_adv_tab_layout' => 'wshk-tabs-vertical',
                ],
            ]
        );
        
        
        $this->add_responsive_control(
            'wshk_adv_tabs_tab_icon_size',//wshk option
            [
                'label' => __('Icon Size', 'wshk-custom-redirections'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 16,
                    'unit' => 'px',
                ],
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        
        $this->add_responsive_control(
            'wshk_adv_tabs_tab_icon_gap',//wshk option
            [
                'label' => __('Icon Gap', 'wshk-custom-redirections'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10,
                    'unit' => 'px',
                ],
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .wshk-tab-inline-icon li i, {{WRAPPER}} .wshk-tab-inline-icon li img' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .wshk-tab-top-icon li i, {{WRAPPER}} .wshk-tab-top-icon li img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        
        $this->add_responsive_control(
            'wshk_adv_tabs_tab_padding',//wshk option
            [
                'label' => esc_html__('Padding', 'wshk-custom-redirections'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        
        $this->add_responsive_control(
            'wshk_adv_tabs_tab_margin',//wshk option
            [
                'label' => esc_html__('Margin', 'wshk-custom-redirections'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        
        $this->start_controls_tabs('wshk_adv_tabs_header_tabs');
        
        
        
        // Normal State Tab
        $this->start_controls_tab('wshk_adv_tabs_header_normal', ['label' => esc_html__('Normal', 'wshk-custom-redirections')]);
        
        
        
        $this->add_control(
            'wshk_adv_tabs_tab_color',//wshk option
            [
                'label' => esc_html__('Background Color', 'wshk-custom-redirections'),
                'type' => Controls_Manager::COLOR,
                'default' => '#f1f1f1',
                'selectors' => [
                    '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        
        
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'wshk_adv_tabs_tab_bgtype',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li',
            ]
        );
        
        
        $this->add_control(
            'wshk_adv_tabs_tab_text_color',//wshk option
            [
                'label' => esc_html__('Text Color', 'wshk-custom-redirections'),
                'type' => Controls_Manager::COLOR,
                'default' => '#321A51',
                'selectors' => [
                    '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        $this->add_control(
            'wshk_adv_tabs_tab_icon_color',//wshk option
            [
                'label' => esc_html__('Icon Color', 'wshk-custom-redirections'),
                'type' => Controls_Manager::COLOR,
                'default' => '#321A51',
                'selectors' => [
                    '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li i' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'wshk_adv_tabs_icon_show' => 'yes',
                ],
            ]
        );
        
        
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'wshk_adv_tabs_tab_border',
                'label' => esc_html__('Border', 'wshk-custom-redirections'),
                'selector' => '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li',
            ]
        );
        
        
        $this->add_responsive_control(
            'wshk_adv_tabs_tab_border_radius',//wshk option
            [
                'label' => esc_html__('Border Radius', 'wshk-custom-redirections'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        
        $this->end_controls_tab();
        
        
        // Hover State Tab
        $this->start_controls_tab('wshk_adv_tabs_header_hover', ['label' => esc_html__('Hover', 'wshk-custom-redirections')]);
        
        
        
        $this->add_control(
            'wshk_adv_tabs_tab_color_hover',//wshk option
            [
                'label' => esc_html__('Tab Background Color', 'wshk-custom-redirections'),
                'type' => Controls_Manager::COLOR,
                'default' => '#321A51',
                'selectors' => [
                    '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        
        
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'wshk_adv_tabs_tab_bgtype_hover',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li:hover',
            ]
        );
        
        
        $this->add_control(
            'wshk_adv_tabs_tab_text_color_hover',//wshk option
            [
                'label' => esc_html__('Text Color', 'wshk-custom-redirections'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        $this->add_control(
            'wshk_adv_tabs_tab_icon_color_hover',//wshk option
            [
                'label' => esc_html__('Icon Color', 'wshk-custom-redirections'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li:hover > i' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'wshk_adv_tabs_icon_show' => 'yes',
                ],
            ]
        );
        
        
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'wshk_adv_tabs_tab_border_hover',
                'label' => esc_html__('Border', 'wshk-custom-redirections'),
                'selector' => '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li:hover',
            ]
        );
        
        
        $this->add_responsive_control(
            'wshk_adv_tabs_tab_border_radius_hover',//wshk option
            [
                'label' => esc_html__('Border Radius', 'wshk-custom-redirections'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        
        
        
        
        
        // Active State Tab
        $this->start_controls_tab('wshk_adv_tabs_header_active', ['label' => esc_html__('Active', 'wshk-custom-redirections')]);
        
        
        
        $this->add_control(
            'wshk_adv_tabs_tab_color_active',//wshk option
            [
                'label' => esc_html__('Tab Background Color', 'wshk-custom-redirections'),
                'type' => Controls_Manager::COLOR,
                'default' => '#321A51',
                'selectors' => [
                    '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li.active' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li.active-default' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        
        
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'wshk_adv_tabs_tab_bgtype_active',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li.active,{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li.active-default',
            ]
        );
        
        
        $this->add_control(
            'wshk_adv_tabs_tab_text_color_active',//wshk option
            [
                'label' => esc_html__('Text Color', 'wshk-custom-redirections'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li.active' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul .active-default .wshk-tab-title' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        $this->add_control(
            'wshk_adv_tabs_tab_icon_color_active',//wshk option
            [
                'label' => esc_html__('Icon Color', 'wshk-custom-redirections'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li.active > i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li.active-default > i' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'wshk_adv_tabs_icon_show' => 'yes',
                ],
            ]
        );
        
        
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'wshk_adv_tabs_tab_border_active',
                'label' => esc_html__('Border', 'wshk-custom-redirections'),
                'selector' => '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li.active, {{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li.active-default',
            ]
        );
        
        
        $this->add_responsive_control(
            'wshk_adv_tabs_tab_border_radius_active',//wshk option
            [
                'label' => esc_html__('Border Radius', 'wshk-custom-redirections'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li.active-default' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        
        
        
        
        
        /**
         * -------------------------------------------
         * Tab Style Advance Tabs Content Style
         * -------------------------------------------
         */
        $this->start_controls_section(
            'wshk_section_adv_tabs_tab_content_style_settings',//wshk option
            [
                'label' => esc_html__('Content', 'wshk-custom-redirections'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        
        
        $this->add_control(
            'adv_tabs_content_bg_color',//wshk_option
            [
                'label' => esc_html__('Background Color', 'wshk-custom-redirections'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-content > div' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        
        
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'adv_tabs_content_bgtype',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-content > div',
            ]
        );
        
        
        $this->add_control(
            'adv_tabs_content_text_color',//wshk option
            [
                'label' => esc_html__('Text Color', 'wshk-custom-redirections'),
                'type' => Controls_Manager::COLOR,
                'default' => '#333',
                'selectors' => [
                    '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-content > div' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'wshk_adv_tabs_content_typography',
                'selector' => '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-content > div',
            ]
        );
        
        
        $this->add_responsive_control(
            'wshk_adv_tabs_content_padding',//wshk option
            [
                'label' => esc_html__('Padding', 'wshk-custom-redirections'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-content > div' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        
        $this->add_responsive_control(
            'wshk_adv_tabs_content_margin',//wshk option
            [
                'label' => esc_html__('Margin', 'wshk-custom-redirections'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-content > div' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'wshk_adv_tabs_content_border',
                'label' => esc_html__('Border', 'wshk-custom-redirections'),
                'selector' => '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-content > div',
            ]
        );
        
        
        $this->add_responsive_control(
            'wshk_adv_tabs_content_border_radius',//wshk option
            [
                'label' => esc_html__('Border Radius', 'wshk-custom-redirections'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wshk-tabs-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wshk_adv_tabs_content_shadow',
                'selector' => '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-content > div',
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();
        
        
        
        
        
        /**
         * -------------------------------------------
         * Tab Style Advance Tabs Caret Style
         * -------------------------------------------
         */
        $this->start_controls_section(
            'wshk_section_adv_tabs_tab_caret_style_settings',//wshk option
            [
                'label' => esc_html__('Caret', 'wshk-custom-redirections'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'wshk_adv_tabs_tab_caret_show',//wshk option
            [
                'label' => esc_html__('Show Caret on Active Tab', 'wshk-custom-redirections'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'return_value' => 'yes',
            ]
        );
        $this->add_control(
            'wshk_adv_tabs_tab_caret_size',//wshk option
            [
                'label' => esc_html__('Caret Size', 'wshk-custom-redirections'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10,
                ],
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li:after' => 'border-width: {{SIZE}}px; bottom: -{{SIZE}}px',
                    '{{WRAPPER}} .wshk-advance-tabs.wshk-tabs-vertical > .wshk-tabs-nav > ul li:after' => 'right: -{{SIZE}}px; top: calc(50% - {{SIZE}}px) !important;',
                ],
                'condition' => [
                    'wshk_adv_tabs_tab_caret_show' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'wshk_adv_tabs_tab_caret_color',//wshk option
            [
                'label' => esc_html__('Caret Color', 'wshk-custom-redirections'),
                'type' => Controls_Manager::COLOR,
                'default' => '#444',
                'selectors' => [
                    '{{WRAPPER}} .wshk-advance-tabs .wshk-tabs-nav > ul li:after' => 'border-top-color: {{VALUE}};',
                    '{{WRAPPER}} .wshk-advance-tabs.wshk-tabs-vertical > .wshk-tabs-nav > ul li:after' => 'border-top-color: transparent; border-left-color: {{VALUE}};',
                ],
                'condition' => [
                    'wshk_adv_tabs_tab_caret_show' => 'yes',
                ],
            ]
        );
        $this->end_controls_section();
        
        
        
        
        
        /**
         * -------------------------------------------
         * Tab Style: Advance Tabs Responsive Controls
         * -------------------------------------------
         */
        $this->start_controls_section(
            'wshk_ad_responsive_controls',//wshk option
            [
                'label' => esc_html__('Responsive Controls', 'wshk-custom-redirections'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'responsive_vertical_layout',
            [
                'label' => __('Vertical Layout', 'wshk-custom-redirections'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'wshk-custom-redirections'),
                'label_off' => __('No', 'wshk-custom-redirections'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();
    }
    
    
    
    
     protected function render() {
        
        
        //include( ABSPATH . '/wp-content/plugins/custom-redirections-for-wshk/elementor/assets/advanced-tabs-css.php' );
        //include( ABSPATH . '/wp-content/plugins/custom-redirections-for-wshk/elementor/assets/advanced-tabs-js.php' ); 
         
         
        $settings = $this->get_settings_for_display();
        $wshk_find_default_tab = [];
        $wshk_adv_tab_id = 1;
        $wshk_adv_tab_content_id = 1;
        $tab_icon_migrated = isset($settings['__fa4_migrated']['wshk_adv_tabs_tab_title_icon_new']);
        $tab_icon_is_new = empty($settings['wshk_adv_tabs_tab_title_icon']);
        $wshkcustomdatatab = 1;
        $wshkcustomdatatab++;
        
        

        $this->add_render_attribute(
            'wshk_tab_wrapper',
            [
                'id' => "wshk-advance-tabs-{$this->get_id()}",
                'class' => ['wshk-advance-tabs', $settings['wshk_adv_tab_layout']],
                'data-tabid' => $this->get_id(),
            ]
        );
        
        if ($settings['wshk_adv_tabs_title_tabs_hide'] === 'yes') {
            echo '<style>.wshk-tabs-nav {display:none;}</style>';
        }
        
        if ($settings['wshk_adv_tabs_tab_caret_show'] != 'yes') {
            $this->add_render_attribute('wshk_tab_wrapper', 'class', 'active-caret-on');
        }

        if ($settings['responsive_vertical_layout'] != 'yes') {
            $this->add_render_attribute('wshk_tab_wrapper', 'class', 'responsive-vertical-layout');
        }

        $this->add_render_attribute('wshk_tab_icon_position', 'class', esc_attr($settings['wshk_adv_tab_icon_position']));
        
        
        
        $wshkdatatab = 1;
        $wshkidtab = 1;
        $wshkcontentdatatab = 1;
        ?>
         
         
        <div <?php echo $this->get_render_attribute_string('wshk_tab_wrapper'); ?>>
            
            
            <div class="wshk-tabs-nav">
                <ul <?php echo $this->get_render_attribute_string('wshk_tab_icon_position'); ?>>
                    <?php foreach ($settings['wshk_adv_tabs_tab'] as $tab):
                    
                    
                    ?>
                    
                        <li id="elementor-tab-title-<?php echo $wshkidtab++; ?>" class="wshk-tab-title <?php echo esc_attr($tab['wshk_adv_tabs_tab_show_as_default']); ?>" data-tab="<?php echo $wshkdatatab++; ?>">
                            <?php if ($settings['wshk_adv_tabs_icon_show'] === 'yes'):
                                if ($tab['wshk_adv_tabs_icon_type'] === 'icon'): ?>
                                    <?php if ($tab_icon_is_new || $tab_icon_migrated) {
                                        if (isset($tab['wshk_adv_tabs_tab_title_icon_new']['value']['url'])) {
                                            echo '<img src="' . $tab['wshk_adv_tabs_tab_title_icon_new']['value']['url'] . '"/>';
                                        } else {
                                            echo '<i class="' . $tab['wshk_adv_tabs_tab_title_icon_new']['value'] . '"></i>';
                                        }
                                    } else {
                                        echo '<i class="' . $tab['wshk_adv_tabs_tab_title_icon'] . '"></i>';
                                    }?>
                                <?php elseif ($tab['wshk_adv_tabs_icon_type'] === 'image'): ?>
                                    <img src="<?php echo esc_attr($tab['wshk_adv_tabs_tab_title_image']['url']); ?>" alt="<?php echo esc_attr(get_post_meta($tab['wshk_adv_tabs_tab_title_image']['id'], '_wp_attachment_image_alt', true)); ?>">
                                <?php endif;?>
                            <?php endif;?> <span class="wshk-tab-title"><?php echo $tab['wshk_adv_tabs_tab_title']; ?></span>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
            
  
        
            <div class="wshk-tabs-content">
  			    <?php foreach ($settings['wshk_adv_tabs_tab'] as $tab):
                    $wshk_find_default_tab[] = $tab['wshk_adv_tabs_tab_show_as_default'];?>
           
                    <div class="wshk-tab-content clearfix <?php echo esc_attr($tab['wshk_adv_tabs_tab_show_as_default']); ?>" data-tab="<?php echo $wshkcontentdatatab++; ?>">
                        <?php if ('content' == $tab['wshk_adv_tabs_text_type']): ?>
                            <?php echo do_shortcode($tab['wshk_adv_tabs_tab_content']); ?>
                        <?php elseif ('template' == $tab['wshk_adv_tabs_text_type']): ?>
						    <?php if (!empty($tab['wshk_primary_templates'])) {
                                echo Plugin::$instance->frontend->get_builder_content($tab['wshk_primary_templates'], true);
                            }?>
					    <?php endif;?>
    			    </div>
			    <?php endforeach;?>
  		    </div>
        </div>
        
    <?php }
    
    
    

   public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);
      
    
      wp_register_script( 'wshk-links-adv-tabs', '/wp-content/plugins/custom-redirections-for-wshk/elementor/assets/linkable-tabs.js', [ 'elementor-frontend' ], '1.0.1', true );
    
      
      
      
      //wp_register_style( 'style-handle', 'path/to/file.CSS');
   }

  public function get_script_depends() {
      
      //return ['wshk-adv-tabs'];
      
    if (\Elementor\Plugin::$instance->editor->is_edit_mode() || \Elementor\Plugin::$instance->preview->is_preview_mode()) {
        return ['wshk-links-adv-tabs'];
    }
      
    if($this->get_settings_for_display('wshk_adv_tabs_linkeable_tabs') === 'yes'){
     return [ 'wshk-links-adv-tabs' ];
    } else {
     return[];
    }
  }
    
    
    /*public function enqueue_scripts() {
        
        
        wp_register_script('wshk-links-adv-tabs', '/wp-content/plugins/custom-redirections-for-wshk/elementor/assets/linkable-tabs.js', array('jquery'), '1', true );
    wp_enqueue_script('wshk-links-adv-tabs');
    }*/
    
    
    
    
    
    /*protected function _content_template()
    {
        
        
         include( ABSPATH . '/wp-content/plugins/custom-redirections-for-wshk/elementor/assets/advanced-tabs-css.php' );
         include( ABSPATH . '/wp-content/plugins/custom-redirections-for-wshk/elementor/assets/advanced-tabs-js.php' );
         
         
        
    }*/
    
    
    
    
    
        
        
    
        
        
    //}//end _register_controls function

    
}