<?php
namespace ElementorStarter\Modules\Starter\Widgets;

// You can add to or remove from this list - it's not conclusive! Chop & change to fit your needs.
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Repeater;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Starter extends Widget_Base {

	/* Uncomment the line below if you do not wish to use the function _content_template() - leave that section empty if this is uncommented! */
	//protected $_has_template_content = false; 
	
	public function get_name() {
		return 'widget-starter';
	}

	public function get_title() {
		return __( 'Widget Starter', 'elementor-starter' );
	}

	public function get_icon() {
		return 'eicon-hypster';
	}

	public function get_categories() {
		return [ 'elementor-start-widgets'];
	}
	
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'elementor-starter' ),
			]
		);
		// Add your widget/element content controls here! Below is an example control
		
		$this->add_control(
			'text',
			[
				'label' => __( 'Text Field', 'elementor-starter' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'I\'m an example text as the content if this element!', 'elementor-starter' ),
			]
		);
		
		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'elementor-starter' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Styles', 'elementor-starter' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		// Add your widget/element styling controls here! - Below is an example style option
		
		$this->add_control(
			'text_transform',
			[
				'label' => __( 'Text Transform', 'elementor-starter' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'None', 'elementor-starter' ),
					'uppercase' => __( 'UPPERCASE', 'elementor-starter' ),
					'lowercase' => __( 'lowercase', 'elementor-starter' ),
					'capitalize' => __( 'Capitalize', 'elementor-starter' ),
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
	}
		
	protected function render() {
		$settings = $this->get_settings();
		
		echo '<div class="title">';
			echo $settings['text'];
		echo '</div>';
	}

	protected function _content_template() {
		/* If you have selected to uncomment the "protected $_has_template_content = false;" above then leave this section empty! */
		?>
		<div class="title">
			{{{ settings.text }}}
		</div>
		<?php
	}
	
}