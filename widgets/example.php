<?php
class Example extends \Elementor\Widget_Base {

	public function get_name() {
		return 'hello_world_widget_2';
	}

	public function get_title() {
		return esc_html__( 'Hello World 2', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'hello', 'world' ];
	}

	protected function register_controls() {

		// Content Tab Start

		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Hello world', 'elementor-addon' ),
			]
		);

		$this->end_controls_section();

		// Content Tab End


		// Style Tab Start

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hello-world' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// Style Tab End

	}

	protected function render() {
		/* https://postimg.cc/k2M2G8Yz */
		/* get API and list table */

		$url = 'http://localhost:8080/whmcs-8.1.3/test.php';
		$params = ['key' => 'cA3pP2dY1mD6sK7l'];
		$serversData = wp_remote_get($url, $params);
		//var_dump($serversData);exit;

		/*
		$settings = $this->get_settings_for_display();

		if ( empty( $settings['title'] ) ) {
			return;
		}
		?>
		<p class="hello-world">
			testest
			<?php echo $settings['title']; ?>
		</p>
		<?php
		*/

		$html = '<div class="productServiceList">';

		$html .= '<div class="productService">';

		$html .= '<div class="productServiceHeading">Heading</div>';

		$html .= '<div class="productServiceDescription">Description</div>';

		$html .= '<div class="productServiceDetails row">';

		$html .= '<div class="col-lg-2 col-sm-12 col-md-2 productServiceDetailsCPU"><h4>CPU</h4><span>Xeon E3 1240 v2 </span></div>';
		$html .= '<div class="col-lg-2 col-sm-12 col-md-2 productServiceDetailsMemory"><h4>CPU</h4><span>Xeon E3 1240 v2 </span></div>';
		$html .= '<div class="col-lg-3 col-sm-12 col-md-3 productServiceDetailsDisk"><h4>CPU</h4><span>Xeon E3 1240 v2 </span></div>';
		$html .= '<div class="col-lg-2 col-sm-12 col-md-2 productServiceDetailsBandwidth"><h4>CPU</h4><span>Xeon E3 1240 v2 </span></div>';
		$html .= '<div class="col-lg-2 col-sm-12 col-md-2 productServiceDetailsIP"><h4>CPU</h4><span>Xeon E3 1240 v2 </span></div>';

		$html .= '</div>';

		$html .= '<div class="productServiceButtonRow justify-content-end">
						<a class="productServiceViewButton" href="//asd.html">View</a>
						<a class="productServiceBuyButton" href="//asd.html">Hemen Al</a>
					</div>';

		$html .= '</div>';



		$html .= '</div>';

		echo $html;
	}

	protected function content_template() {
		?>
		<#
		if ( '' === settings.title ) {
			return;
		}
		#>
		<p class="hello-world">
			{{ settings.title }}
		</p>
		<?php
	}
}