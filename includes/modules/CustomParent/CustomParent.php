<?php
/**
 * Parent module (module which has module item / child module) with FULL builder support
 * This module appears on Visual Builder and requires react component to be provided
 * Due to full builder support, all advanced options (except button options) are added by default
 *
 * @since 1.0.0
 */
class DICM_Parent extends ET_Builder_Module {
	// Module slug (also used as shortcode tag)
	public $slug       = 'dicm_parent';

	// Full Visual Builder support
	public $vb_support = 'on';

	// Module item's slug
	public $child_slug = 'dicm_child';

	/**
	 * Module properties initialization
	 *
	 * @since 1.0.0
	 */
	function init() {
		// Module name
		$this->name                    = esc_html__( 'Custom Parent', 'dicm_divi_custom_modules' );

		// Module Icon
		// Load customized svg icon and use it on builder as module icon. If you don't have svg icon, you can use
		// $this->icon for using etbuilder font-icon. 
		$this->icon_path               =  plugin_dir_path( __FILE__ ) . 'icon.svg';

		// Toggle settings
		$this->settings_modal_toggles  = array(
			'general'  => array(
				'toggles' => array(
					'section_label' 	=> esc_html__( 'Section Label', 'dicm_divi_custom_modules' ),
					'tiles' 					=> esc_html__( 'Tiles', 'dicm_divi_custom_modules' ),
					'algolia_setting' => esc_html__( 'Algolia Setting', 'dicm_divi_custom_modules' ),
				),
			),
		);
	}

	/**
	 * Module's specific fields
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	function get_fields() {
		return array(
			'section_label' => array(
				'label'           => esc_html__( 'Section Label Text', 'dicm_divi_custom_modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Text entered here will appear as title.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     => 'section_label',
			),
			'label_type' => array(
				'label'           => esc_html__( 'Section Label Type', 'dicm_divi_custom_modules' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'					=> array(
					'hidden'				=> esc_html__( 'Hidden', 'dicm_divi_custom_modules' ),
					'vertical'			=> esc_html__( 'Vertical', 'dicm_divi_custom_modules' ),
					'top'						=> esc_html__( 'Top', 'dicm_divi_custom_modules' ),
				),
				'default_on_front'=> 'vertical',
				'description'     => esc_html__( 'Select info here will appear inside the module.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     => 'section_label',
			),
			'view_mode' => array(
				'label'           => esc_html__( 'View Mode', 'dicm_divi_custom_modules' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'					=> array(
					'grid'		=> esc_html__( 'Grid Tiles', 'dicm_divi_custom_modules' ),
					'row'			=> esc_html__( 'Row Tiles', 'dicm_divi_custom_modules' ),
				),
				'default_on_front'=> 'grid',
				'description'     => esc_html__( 'Select info here will appear inside the module.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     => 'tiles',
			),
			'use_algolia' => array(
				'label'           	=> esc_html__( 'Use Algolia', 'dicm_divi_custom_modules' ),
				'type'            	=> 'yes_no_button',
				'option_category' 	=> 'configuration',
				'options'         	=> array(
					'off'  	=> esc_html__( 'Off', 'dicm_divi_custom_modules' ),
					'on' 		=> esc_html__( 'On', 'dicm_divi_custom_modules' ),
				),
				'toggle_slug'     	=> 'algolia_setting',
				'tab_slug'		  		=> 'general',
			),
			'instantsearch' => array(
        'label'           => esc_html__( 'Instant Search', 'dicm_divi_custom_modules' ),
        'type'            => 'text',
        'option_category' => 'basic_option',
        'description'     => esc_html__( 'Input variable name of instantsearch. ', 'dicm_divi_custom_modules' ),
        'toggle_slug'     => 'algolia_setting',
        'default'     		=> 'searchDiscover',
        'tab_slug'		 	 	=> 'general',
        'show_if'   			=> array( 'use_algolia' => 'on'),
      ),
      'container_id' => array(
        'label'           => esc_html__( 'ID of Container', 'dicm_divi_custom_modules' ),
        'type'            => 'text',
        'option_category' => 'basic_option',
        'description'     => esc_html__( 'Input id of container here.', 'dicm_divi_custom_modules' ),
        'toggle_slug'     => 'algolia_setting',
        'default'     		=> 'hits',
        'tab_slug'		  	=> 'general',
        'show_if'   			=> array( 'use_algolia' => 'on'),
      ),
		);
	}
	function get_section_label_html() {
		$style_section = 'section-label';
		$section_label = $this->props['section_label'];
		
		return 
			'<div class="' . $style_section . '">
  			<div class="content">' . $section_label . '</div>
			</div>';
	}

	function get_parentTile_openTag()
	{
		$style_tiles = 'deeds-tiles';
		$view_mode = $this->props['view_mode'];
		return '<div class="' . $style_tiles . ' ' . $view_mode . '">';
	}

	function get_parentTile_endTag() {
		return '</div>';
	}

	function get_js_start()
	{
		$javascript = '
			
			searchDiscover.addWidget({
		  	render: function(data) {
			    var $hits = [];
			    var is_empty = 1;
		';
	}
	function get_js_end()
	{
		$javascript = '
					$hits.push('</div>');

			   	if (is_empty) {
			      document.getElementById('hits').innerHTML = 'No result found.';
			    } else {
			      document.getElementById('hits').innerHTML = $hits.join('');
			    }
			  },
			});
		';
	}

	function get_algolia_section_label_html() {
		$style_section = 'section-label';
		$section_label = $this->props['section_label'];
		
		return '
			$hits.push(\'<div class="' . $style_section . '">\');
  		$hits.push(\'<div class="content">' . $section_label . '</div>\');
			$hits.push(\'</div>\');
			';
	}

	function get_algolia_parentTile_openTag()
	{
		$style_tiles = 'deeds-tiles';
		$view_mode = $this->props['view_mode'];
		return '
			$hits.push(\'<div class="' . $style_tiles . ' ' . $view_mode . '">\');
			';
	}

	function get_algolia_parentTile_endTag() {
		return '
			$hits.push(\'</div>\');
			';
	}
	function get_html_with_js() {
		

		wp_enqueue_style( 'tile-styles', plugins_url('/divi-extension-example-master/styles/deeds-tile.css') );
		wp_register_script( 'test-register', plugins_url('/divi-extension-example-master/test.js'));
		wp_enqueue_script( 'test-divi-module', plugins_url('/divi-extension-example-master/test.js'), array('test-register'));
		wp_localize_script( 'test-divi-module', 'testSettings', array('test-string' => $title,));
		wp_print_scripts( 'test-divi-module');
		$html =  $this->get_parentTile_openTag();
		return $html;
	}

	/**
	 * Render module output
	 *
	 * @since 1.0.0
	 *
	 * @param array  $attrs       List of unprocessed attributes
	 * @param string $content     Content being processed
	 * @param string $render_slug Slug of module that is used for rendering output
	 *
	 * @return string module's rendered output
	 */
	function render( $attrs, $content = null, $render_slug ) {
		// Module specific props added on $this->get_fields()
		$title = $this->props['title'];
		$use_algolia = $this->props['use_algolia'];
		// Render module content
		if ($use_algolia === 'off') {
			return $output = sprintf(
				'<div>
				  %1$s
					%2$s
						%3$s
					%4$s
				</div>
				'
				, $this->get_section_label_html()
				, $this->get_parentTile_openTag()
				, $this->content
				, $this->get_parentTile_endTag()
			);
		} else {
			return $output = sprintf(
				'<script>
					%5$s
						%1$s
						%2$s
							%3$s
						%4$s
					%6$s
				</script>
				'
				, $this->get_section_label_html()
				, $this->get_parentTile_openTag()
				, $this->content
				, $this->get_parentTile_endTag()
				, $this->get_js_start()
				, $this->get_js_end()
			);
		}
		// Render wrapper
		// 3rd party module with no full VB support has to wrap its render output with $this->_render_module_wrapper().
		// This method will automatically add module attributes and proper structure for parallax image/video background
		// return $this->_render_module_wrapper( $output, $render_slug );
	}
}

new DICM_Parent;
