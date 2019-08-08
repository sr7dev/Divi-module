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
		$this->name                    = esc_html__( 'Algolia Hits v2', 'dicm_divi_custom_modules' );

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
					'cloud_image'							=> esc_html( 'Cloud Image', 'dicm-divi-custom-modules' ),
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
      // Cloud image tab
			'use_resp_js_cloud_img' => array(
				'label'           		=> esc_html__( 'Use Responsive JS Cloud Image', 'dicm_divi_custom_modules' ),
				'type'            		=> 'yes_no_button',
				'option_category' 		=> 'configuration',
				'description'     		=> esc_html__( 'Use responsive js cloud image.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     		=> 'cloud_image',
				'options'         		=> array(
					'off'  	=> esc_html__( 'Off', 'dicm_divi_custom_modules' ),
					'on' 		=> esc_html__( 'On', 'dicm_divi_custom_modules' ),
				),
				'default'							=> 'on',
			),
			'resp_js_cloud_ratio' => array(
				'label'           	=> esc_html__( 'Ratio', 'dicm_divi_custom_modules' ),
				'type'            	=> 'text',
				'option_category' 	=> 'configuration',
				'description'     	=> esc_html__( 'Ratio.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     	=> 'cloud_image',
				'default'						=> '1',
				'show_if'   				=> array( 'use_resp_js_cloud_img' => 'on'),
			),
			'load_init' => array(
				'label'           	=> esc_html__( 'Load Init Function', 'dicm_divi_custom_modules' ),
				'type'            	=> 'yes_no_button',
				'option_category' 	=> 'configuration',
				'description'     	=> esc_html__( 'Load init function.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     	=> 'cloud_image',
				'options'         	=> array(
					'off'  	=> esc_html__( 'Off', 'dicm_divi_custom_modules' ),
					'on' 		=> esc_html__( 'On', 'dicm_divi_custom_modules' ),
				),
				'default'							=> 'on',
				'show_if'   				=> array( 'use_resp_js_cloud_img' => 'on'),
			),
			'resp_init_again_call_delay' => array(
				'label'           	=> esc_html__( 'Call again after delay time for JS Responsive Cloud Image', 'dicm_divi_custom_modules' ),
				'type'            	=> 'text',
				'option_category' 	=> 'configuration',
				'description'     	=> esc_html__( 'Init again call delay.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     	=> 'cloud_image',
				'number_validation' => true,
        'value_type'        => 'int',
        'value_min'         => 0,
				'show_if'   				=> array( 'use_resp_js_cloud_img' => 'on'),
			),

		);
	}

	function cloud_img_prefix()
  	{
	  if (function_exists ('get_cloud_img_prefix'))
	  {

		  return get_cloud_img_prefix("","","","");
	  }
	  return "";
	
	}
	function cloud_img_gray_prefix()
	{
	  if (function_exists ('get_cloud_img_gray_prefix'))
	  {

		  return get_cloud_img_gray_prefix("","","","");
	  }
	  return "";
	
	}
	function cloud_img_full_prefix($operation, $width, $height, $filter)
	{
		if (function_exists ('get_cloud_img_prefix'))
		{

			return get_cloud_img_prefix($operation, $width, $height, $filter);
		}
		return "";
		
	}

	function get_section_label_html() {
		$sectionLabel_style = 'section-label';
		$section_label = $this->props['section_label'];
		
		return 
			'<div class="' . $sectionLabel_style . '">
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
		global $cloudimg_using, $cloudimg_url_prefix, $cloudimg_operation, $cloudimg_token, $cloudimg_width, $cloudimg_height, $cloudimg_filter;
		
		$container_id = $this->props['container_id'];
		// could image tab
		$useCloudImage = $this->props['use_resp_js_cloud_img'];
		$respJSCloudRatio = $this->props['resp_js_cloud_ratio'];
		$loadInit = $this->props['load_init'];
		$respInitDelay = $this->props['resp_init_again_call_delay'];
		$instantSearch = $this->props['instantsearch'];
		return $javascript = "
			function get_cloudImage_url(org_url, isGray)
			{
			
				var cloud_img_pre;
				if (isGray) {
					cloud_img_pre = '" .$this->cloud_img_gray_prefix(). "';
				}
				else
				{
					cloud_img_pre = '" .$this->cloud_img_prefix(). "';
				}
				if (typeof (is_absolute_url) === \"function\" && is_absolute_url(org_url))
				{
					return cloud_img_pre + org_url;
				}
				else if (cloud_img_pre.length > 0)
				{
					return cloud_img_pre + \"_deeds_/\" + org_url;
				}
				else 
					return org_url;
			}
		
			function get_cloudImage_fullparam_url(org_url, operation, size, filter)
			{
				// console.log(\"get_cloudImage_fullparam_url\", org_url, operation, size, filter);
				var cloud_img_pre;
				if (!operation)
					operation = '" .$cloudimg_operation. "';
				if (!size)
					size = '" .$cloudimg_width. "x" .$cloudimg_height. "';
			
				if (!filter)
					filter = '".$cloudimg_filter. "';
				// console.log(\"changed  get_cloudImage_fullparam_url\", org_url, operation, size, filter);
				cloud_img_pre =  '//' + '" .$cloudimg_token. "' + '.cloudimg.io/' + operation + '/' + size + '/' + filter + '/';
				// console.log(\"cloud_img_pre\", cloud_img_pre);
				if (typeof (is_absolute_url) === \"function\" && is_absolute_url(org_url))
				{
					return cloud_img_pre + org_url;
				}
				else
				{
					return cloud_img_pre + \"_deeds_\" + org_url;
				}
			}
			
			
			console.log('Tiles module loading');
			document.addEventListener('DOMContentLoaded', function(event) 
			{
				
				var user_id = ". (is_user_logged_in() ? get_current_user_id() : -1) . "
				if (Number.isInteger(user_id))
					user_id = user_id.toString();
			});
			console.log('Tiles module Lendering');
			".$instantSearch.".on('render', function() {	
				console.log('Tiles module Lendered');
				function load_js_responsive_cloudimage()
				{
					var cloudimgResponsive" .$container_id. " = new window.CIResponsive({
						token: 'amdgjadcen',
						lazyLoading: true,
						exactSize: true,
						imgLoadingAnimation: false,
					});
					window.lazySizes.init();
					console.log('Loaded cloud image js');
				}
				console.log('Loading cloud image js');
				load_js_responsive_cloudimage();

				".($respInitDelay ?	'setTimeout(load_js_responsive_cloudimage,' .$respInitDelay.'");'
				:'')
			."
			});
			".$instantSearch.".addWidget({
				render: function(data) {
					var \$hits = [];
					var is_empty = 1;
		";
	}
	function get_js_end()
	{
		$container_id = $this->props['container_id'];
		$instantSearch = $this->props['instantsearch'];
		return $javascript = "
					if (is_empty) {
						document.getElementById('". $container_id . "').innerHTML = 'No result found.';
					} else {
						document.getElementById('". $container_id ."').innerHTML = \$hits.join('');
					}
					console.log('End1');
				}
			});
		";
	}

	function get_algolia_section_label_html() {
		$sectionLabel_style = 'section-label';
		$section_label = $this->props['section_label'];
		
		return '
			$hits.push(\'<div class="' . $sectionLabel_style . '">\');
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

	function get_html() {
		wp_enqueue_style( 'tile-styles', plugins_url('/UniversalTileModule/styles/deeds-tile.css') );
		wp_register_script( 'test-register', plugins_url('/UniversalTileModule/test.js'));
		wp_enqueue_script( 'test-divi-module', plugins_url('/UniversalTileModule/test.js'), array('test-register'));
		wp_localize_script( 'test-divi-module', 'testSettings', array('test-string' => $title,));
		wp_print_scripts( 'test-divi-module');
		$container_id = $this->props['container_id'];

		$html = ('<div id="'.$container_id.'" style="color:#000000 !important"></div>');
 
		return $html;
	}

	function getContents($str, $startDelimiter, $endDelimiter) {
		$contents = array();
		$startDelimiterLength = strlen($startDelimiter);
		$endDelimiterLength = strlen($endDelimiter);
		$startFrom = $contentStart = $contentEnd = 0;
		while (false !== ($contentStart = strpos($str, $startDelimiter, $startFrom))) {
		  $contentStart += $startDelimiterLength;
		  $contentEnd = strpos($str, $endDelimiter, $contentStart);
		  if (false === $contentEnd) {
			break;
		  }
		  $contents[] = substr($str, $contentStart, $contentEnd - $contentStart);
		  $startFrom = $contentEnd + $endDelimiterLength;
		}
	  
		return $contents;
	}
	  
	
	function strip_invalid_tags($org_text)
	{
		$start_symbol = '{CHILD_JS_START}';
		$end_symbol = '{CHILD_JS_END}';
		$text = $org_text;
		
		$codes = $this->getContents($text, $start_symbol, $end_symbol);
		return implode($codes, "\n");
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
				'<script src="https://cdn.scaleflex.it/filerobot/js-cloudimage-responsive/lazysizes.min.js"></script>
		  		<script src="https://cdn.scaleflex.it/filerobot/js-cloudimage-responsive/v1.1.0.min.js"></script>
				%7$s
				<script>
					%5$s
						%1$s
						%2$s
							%3$s
						%4$s
					%6$s
				</script>
				
				'
				, $this->get_algolia_section_label_html()
				, $this->get_algolia_parentTile_openTag()
				, $this->strip_invalid_tags($this->content)
				, $this->get_algolia_parentTile_endTag()
				, $this->get_js_start()
				, $this->get_js_end()
				, $this->get_html()
			);

			
		}
		// Render wrapper
		// 3rd party module with no full VB support has to wrap its render output with $this->_render_module_wrapper().
		// This method will automatically add module attributes and proper structure for parallax image/video background
		// return $this->_render_module_wrapper( $output, $render_slug );
	}
}

new DICM_Parent;
