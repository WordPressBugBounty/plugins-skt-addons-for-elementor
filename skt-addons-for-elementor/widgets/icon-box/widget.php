<?php
/**
 * Icon Box widget class
 *
 * @package Skt_Addons_Elementor
 */
namespace Skt_Addons_Elementor\Elementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

defined( 'ABSPATH' ) || die();

class Icon_Box extends Base {

	/**
	 * Get widget title.
	 *
	 * @since 1.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Icon Box', 'skt-addons-for-elementor' );
	}

	public function get_custom_help_url() {
		return '#';
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'skti skti-icon-box';
	}

	public function get_keywords() {
		return [ 'info', 'box', 'icon' ];
	}

	/**
     * Register widget content controls
     */
	protected function register_content_controls() {

		$this->start_controls_section(
			'_section_icon',
			[
				'label' => __( 'Content', 'skt-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		if ( skt_addons_elementor_is_elementor_version( '<', '2.6.0' ) ) {
			$this->add_control(
				'icon',
				[
					'show_label' => false,
					'type' => Controls_Manager::ICON,
					'label_block' => true,
					'options' => skt_addons_elementor_get_skt_addons_elementor_icons(),
					'default' => 'fa fa-rocket',
				]
			);
		} else {
			$this->add_control(
				'selected_icon',
				[
					'show_label' => false,
					'type' => Controls_Manager::ICONS,
					'fa4compatibility' => 'icon',
					'label_block' => true,
					'default' => [
						'value' => 'fas fa-rocket',
						'library' => 'fa-solid',
					]
				]
			);
		}

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'skt-addons-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __( 'SKT Icon Box', 'skt-addons-for-elementor' ),
				'placeholder' => __( 'Type Icon Box Title', 'skt-addons-for-elementor' ),
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'badge_text',
			[
				'label' => __( 'Badge Text', 'skt-addons-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'Type Icon Badge Text', 'skt-addons-for-elementor' ),
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Box Link', 'skt-addons-for-elementor' ),
				'separator' => 'before',
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://example.com',
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label' => __( 'Title HTML Tag', 'skt-addons-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'separator' => 'before',
				'options' => [
					'h1'  => [
						'title' => __( 'H1', 'skt-addons-for-elementor' ),
						'icon' => 'eicon-editor-h1'
					],
					'h2'  => [
						'title' => __( 'H2', 'skt-addons-for-elementor' ),
						'icon' => 'eicon-editor-h2'
					],
					'h3'  => [
						'title' => __( 'H3', 'skt-addons-for-elementor' ),
						'icon' => 'eicon-editor-h3'
					],
					'h4'  => [
						'title' => __( 'H4', 'skt-addons-for-elementor' ),
						'icon' => 'eicon-editor-h4'
					],
					'h5'  => [
						'title' => __( 'H5', 'skt-addons-for-elementor' ),
						'icon' => 'eicon-editor-h5'
					],
					'h6'  => [
						'title' => __( 'H6', 'skt-addons-for-elementor' ),
						'icon' => 'eicon-editor-h6'
					]
				],
				'default' => 'h2',
				'toggle' => false,
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'skt-addons-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'skt-addons-for-elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'skt-addons-for-elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'skt-addons-for-elementor' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justify', 'skt-addons-for-elementor' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'toggle' => true,
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};'
				]
			]
		);

		$this->end_controls_section();
	}

	/**
     * Register widget style controls
     */
	protected function register_style_controls() {
		$this->__icon_style_controls();
		$this->__title_style_controls();
		$this->__badge_style_controls();
	}

	protected function __icon_style_controls() {

		$this->start_controls_section(
			'_section_style_icon',
			[
				'label' => __( 'Icon', 'skt-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Size', 'skt-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .skt-icon-box-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_padding',
			[
				'label' => __( 'Padding', 'skt-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .skt-icon-box-icon' => 'padding: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_spacing',
			[
				'label' => __( 'Bottom Spacing', 'skt-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'max' => 150,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .skt-icon-box-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_border',
				'selector' => '{{WRAPPER}} .skt-icon-box-icon'
			]
		);

		$this->add_responsive_control(
			'icon_border_radius',
			[
				'label' => __( 'Border Radius 123', 'skt-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .skt-icon-box-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_shadow',
				'selector' => '{{WRAPPER}} .skt-icon-box-icon'
			]
		);

		$this->start_controls_tabs( '_tabs_icon' );

		$this->start_controls_tab(
			'_tab_icon_normal',
			[
				'label' => __( 'Normal', 'skt-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'skt-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .skt-icon-box-icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_bg_color',
			[
				'label' => __( 'Background Color', 'skt-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .skt-icon-box-icon' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_bg_rotate',
			[
				'label' => __( 'Rotate Icon Box', 'skt-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'deg' ],
				'default' => [
					'unit' => 'deg',
				],
				'range' => [
					'deg' => [
						'min' => 0,
						'max' => 360,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .skt-icon-box-icon' => '-webkit-transform: rotate({{SIZE}}{{UNIT}}); transform: rotate({{SIZE}}{{UNIT}});',
					'{{WRAPPER}} .skt-icon-box-icon > i' => '-webkit-transform: rotate(-{{SIZE}}{{UNIT}}); transform: rotate(-{{SIZE}}{{UNIT}});',
				],
				'condition' => [
					'icon_bg_color!' => '',
				]
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'_tab_button_hover',
			[
				'label' => __( 'Hover', 'skt-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'icon_hover_color',
			[
				'label' => __( 'Color', 'skt-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}:hover .skt-icon-box-icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_hover_bg_color',
			[
				'label' => __( 'Background Color', 'skt-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}:hover .skt-icon-box-icon' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_hover_border_color',
			[
				'label' => __( 'Border Color', 'skt-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}:hover .skt-icon-box-icon' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'icon_border_border!' => '',
				]
			]
		);

		$this->add_control(
			'icon_hover_bg_rotate',
			[
				'label' => __( 'Rotate Icon Box', 'skt-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'deg' ],
				'default' => [
					'unit' => 'deg',
				],
				'range' => [
					'deg' => [
						'min' => 0,
						'max' => 360,
					],
				],
				'selectors' => [
					'{{WRAPPER}}:hover .skt-icon-box-icon' => '-webkit-transform: rotate({{SIZE}}{{UNIT}}); transform: rotate({{SIZE}}{{UNIT}});',
					'{{WRAPPER}}:hover .skt-icon-box-icon > i' => '-webkit-transform: rotate(-{{SIZE}}{{UNIT}}); transform: rotate(-{{SIZE}}{{UNIT}});',
				],
				'condition' => [
					'icon_bg_color!' => '',
				]
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	protected function __title_style_controls() {

		$this->start_controls_section(
			'_section_style_title',
			[
				'label' => __( 'Title', 'skt-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title',
				'selector' => '{{WRAPPER}} .skt-icon-box-title',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title',
				'selector' => '{{WRAPPER}} .skt-icon-box-title',
			]
		);

		$this->start_controls_tabs( '_tabs_title' );

		$this->start_controls_tab(
			'_tab_title_normal',
			[
				'label' => __( 'Normal', 'skt-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Text Color', 'skt-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .skt-icon-box-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'_tab_title_hover',
			[
				'label' => __( 'Hover', 'skt-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'title_hover_color',
			[
				'label' => __( 'Text Color', 'skt-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}:hover .skt-icon-box-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	protected function __badge_style_controls() {

		$this->start_controls_section(
			'_section_style_badge',
			[
				'label' => __( 'Badge', 'skt-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'badge_offset_toggle',
			[
				'label' => __( 'Offset', 'skt-addons-for-elementor' ),
				'type' => Controls_Manager::POPOVER_TOGGLE,
				'label_off' => __( 'None', 'skt-addons-for-elementor' ),
				'label_on' => __( 'Custom', 'skt-addons-for-elementor' ),
				'return_value' => 'yes',
			]
		);

		$this->start_popover();

		$this->add_responsive_control(
			'badge_offset_x',
			[
				'label' => __( 'Offset Left', 'skt-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'condition' => [
					'badge_offset_toggle' => 'yes'
				],
				'default' => [
					'size' => 1
				],
				'range' => [
					'px' => [
						'min' => -250,
						'max' => 250,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .skt-badge' => '--skt-badge-translate-x: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'badge_offset_y',
			[
				'label' => __( 'Offset Top', 'skt-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'condition' => [
					'badge_offset_toggle' => 'yes'
				],
				'default' => [
					'size' => 1
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .skt-badge' => '--skt-badge-translate-y: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_popover();

		$this->add_responsive_control(
			'badge_padding',
			[
				'label' => __( 'Padding', 'skt-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .skt-badge' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'badge_color',
			[
				'label' => __( 'Text Color', 'skt-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .skt-badge' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'badge_bg_color',
			[
				'label' => __( 'Background Color', 'skt-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .skt-badge' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'badge_border',
				'selector' => '{{WRAPPER}} .skt-badge',
			]
		);

		$this->add_responsive_control(
			'badge_border_radius',
			[
				'label' => __( 'Border Radius', 'skt-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .skt-badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'badge_box_shadow',
				'selector' => '{{WRAPPER}} .skt-badge',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'badge_typography',
				'label' => __( 'Typography', 'skt-addons-for-elementor' ),
				'default' => [
					'font_size' => ['']
				],
				'selector' => '{{WRAPPER}} .skt-badge',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
			],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render widget output on the frontend.
	 *
	 * Used to generate the final HTML displayed on the frontend.
	 *
	 * Note that if skin is selected, it will be rendered by the skin itself,
	 * not the widget.
	 *
	 * @since 1.0
	 * @access public
	 */
	public function render_content() {
		/**
		 * Before widget render content.
		 *
		 * Fires before Elementor widget is being rendered.
		 *
		 * @since 1.0
		 *
		 * @param Widget_Base $this The current widget.
		 */
		do_action( 'elementor/widget/before_render_content', $this );

		ob_start();

		$skin = $this->get_current_skin();
		if ( $skin ) {
			$skin->set_parent( $this );
			$skin->render();
		} else {
			$this->render();
		}

		$widget_content = ob_get_clean();

		if ( empty( $widget_content ) ) {
			return;
		}

		if ( skt_addons_elementor()->editor->is_edit_mode() ) {
			$this->render_edit_tools();
		}

		$tag = 'div';
		$link = $this->get_settings_for_display( 'link' );
		$this->add_render_attribute( 'icon_box', 'class', 'elementor-widget-container' );

		if ( ! empty( $link['url'] ) ) {
			$tag = 'a';
			$this->add_render_attribute( 'icon_box', 'class', 'skt-icon-box-link' );
			$this->add_link_attributes( 'icon_box', $link );
		}
		?>
		<<?php echo wp_kses_post($tag); ?> <?php echo wp_kses_post($this->get_render_attribute_string( 'icon_box' )); ?>>
			<?php

			/**
			 * Render widget content.
			 *
			 * Filters the widget content before it's rendered.
			 *
			 * @since 1.0
			 *
			 * @param string      $widget_content The content of the widget.
			 * @param Widget_Base $this           The widget.
			 */
			$widget_content = apply_filters( 'elementor/widget/render_content', $widget_content, $this );

			echo wp_kses_post($widget_content); // XSS ok.
			?>
		</<?php echo wp_kses_post($tag); ?>>
		<?php
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_inline_editing_attributes( 'title', 'basic' );
		$this->add_render_attribute( 'title', 'class', 'skt-icon-box-title' );

		$this->add_inline_editing_attributes( 'badge_text', 'none' );
		$this->add_render_attribute( 'badge_text', 'class', 'skt-badge skt-badge--top-right' );
		?>

		<?php if ( $settings['badge_text'] ) : ?>
			<span <?php $this->print_render_attribute_string( 'badge_text' ); ?>><?php echo esc_html( $settings['badge_text'] ); ?></span>
		<?php endif; ?>

		<?php if ( ! empty( $settings['icon'] ) || ! empty( $settings['selected_icon']['value'] ) ) : ?>
			<span class="skt-icon-box-icon">
				
				<?php 
				echo wp_kses_post('<i aria-hidden="true" class="'.$settings['selected_icon']['value'].'"></i>');
				//skt_addons_elementor_render_icon( $settings, 'icon', 'selected_icon' ); ?>
			</span>
		<?php endif;
		// Resolved escaping issue
		if ( ! empty( $settings['title'] ) ) :
			$title_tag = isset( $settings['title_tag'] ) ? sanitize_html_class( $settings['title_tag'] ) : 'h2';
			$valid_tags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'div', 'span'];
			if ( ! in_array( $title_tag, $valid_tags, true ) ) {
				$title_tag = 'h2';
			}
			$title_content = wp_kses_post( skt_addons_elementor_kses_basic( $settings['title'] ) );
			printf(
				'<%1$s %2$s>%3$s</%1$s>',
				esc_html( $title_tag ),
				wp_kses_post( $this->get_render_attribute_string( 'title' ) ),
				$title_content // Add this argument for %3$s
			);
		endif;
	}

	public function content_template() {
		?>
		<#
		var iconHTML = migrated = '';

		if ( haHasIconLibrary() ) {
			iconHTML = elementor.helpers.renderIcon( view, settings.selected_icon, { 'aria-hidden': true }, 'i' , 'object' ),
			migrated = elementor.helpers.isIconMigrated( settings, 'selected_icon' );
		}

		view.addInlineEditingAttributes( 'title', 'basic' );
		view.addRenderAttribute( 'title', 'class', 'skt-icon-box-title' );

		view.addInlineEditingAttributes( 'badge_text', 'none' );
		view.addRenderAttribute( 'badge_text', 'class', 'skt-badge skt-badge--top-right' );

		if (settings.link.url) {
			view.addRenderAttribute( 'link', 'class', 'skt-icon-box-link' );
			view.addRenderAttribute( 'link', 'href', settings.link.url );
			print( '<a ' + view.getRenderAttributeString( 'link' ) + '>' );
		} #>

		<# if (settings.badge_text) { #>
			<span {{{ view.getRenderAttributeString( 'badge_text' ) }}}>{{ settings.badge_text }}</span>
		<# } #>

		<# if ( settings.icon || settings.selected_icon.value ) { #>
			<span class="skt-icon-box-icon">
				<# if ( haHasIconLibrary() && iconHTML && iconHTML.rendered && ( ! settings.icon || migrated ) ) { #>
					{{{ iconHTML.value }}}
				<# } else { #>
					<i class="{{ settings.icon }}" aria-hidden="true"></i>
				<# } #>
			</span>
		<# } #>

		<# if (settings.title) { #>
			<{{ settings.title_tag }} {{{ view.getRenderAttributeString( 'title' ) }}}>{{ settings.title }}</{{ settings.title_tag }}>
		<# } #>

		<# if (settings.link.url) {
			print( '</a>' );
		} #>
		<?php
	}
}