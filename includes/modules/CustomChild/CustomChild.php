<?php
/**
 * Child module / module item (module which appears inside parent module) with FULL builder support
 * This module appears on Visual Builder and requires react component to be provided
 * Due to full builder support, all advanced options (except button options) are added by default
 *
 * @since 1.0.0
 */
class DICM_Child extends ET_Builder_Module {
	// Module slug (also used as shortcode tag)
	public $slug                     = 'dicm_child';

	// Module item has to use `child` as its type property
	public $type                     = 'child';

	// Module item's attribute that will be used for module item label on modal
	public $child_title_var          = 'title';

	// If the attribute defined on $this->child_title_var is empty, this attribute will be used instead
	public $child_title_fallback_var = 'subtitle';

	// Full Visual Builder support
	public $vb_support = 'on';

	/**
	 * Module properties initialization
	 *
	 * @since 1.0.0
	 *
	 * @todo Remove $this->advanced_options['background'] once https://github.com/elegantthemes/Divi/issues/6913 has been addressed
	 */
	function init() {
		// Module name
		$this->name             = esc_html__( 'Deeds Tile', 'dicm_divi_custom_modules' );

		// Default label for module item. Basically if $this->child_title_var and $this->child_title_fallback_var
		// attributes are empty, this default text will be used instead as item label
		$this->advanced_setting_title_text = esc_html__( 'Item', 'et_builder' );

		// Module item's modal title
		$this->settings_text = esc_html__( 'Item Settings', 'et_builder' );

		// Toggle settings
		$this->settings_modal_toggles  = array(
			'general'  => array(
				'toggles' => array(
					'input_information'       => esc_html( 'Input Information', 'dicm-divi-custom-modules' ),
					'show_infomation' 				=> esc_html__( 'Show Information', 'dicm_divi_custom_modules' ),
					'alignment'      					=> esc_html( 'Alignment', 'dicm-divi-custom-modules' ),
					'size'       							=> esc_html( 'Size', 'dicm-divi-custom-modules' ),
					'cloud_image'							=> esc_html( 'Cloud Image', 'dicm-divi-custom-modules' ),
					'preload_animation'				=> esc_html( 'Preload Animation', 'dicm-divi-custom-modules' ),
					'extra_setting'						=> esc_html( 'Extra Setting', 'dicm-divi-custom-modules' ),
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
			// Input Information tab
			'use_algolia_field' => array(
				'label'           	=> esc_html__( 'Use Algolia Field', 'dicm_divi_custom_modules' ),
				'type'            	=> 'yes_no_button',
				'option_category' 	=> 'configuration',
				'description'     	=> esc_html__( 'Algolia field will use or not.', 'dicm_divi_custom_modules' ),
				'options'         	=> array(
					'off'  	=> esc_html__( 'Off', 'dicm_divi_custom_modules' ),
					'on' 		=> esc_html__( 'On', 'dicm_divi_custom_modules' ),
				),
				'toggle_slug'     	=> 'input_information',
				'default'						=> 'on',
				'show_if'   				=> array( 'parentModule:use_algolia' => 'on'),
			),
			'main_title' => array(
				'label'           	=> esc_html__( 'Main Title', 'dicm_divi_custom_modules' ),
				'type'            	=> 'text',
				'option_category' 	=> 'configuration',
				'description'     	=> esc_html__( 'Input main title.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     	=> 'input_information',
			),
			'sub_title' => array(
				'label'           	=> esc_html__( 'Sub Title', 'dicm_divi_custom_modules' ),
				'type'            	=> 'text',
				'option_category' 	=> 'configuration',
				'description'     	=> esc_html__( 'Input sub title.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     	=> 'input_information',
			),
			'extra_info' => array(
				'label'           	=> esc_html__( 'Extra Info', 'dicm_divi_custom_modules' ),
				'type'            	=> 'text',
				'option_category' 	=> 'configuration',
				'description'     	=> esc_html__( 'Input extra info.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     	=> 'input_information',
			),
			'img_src' => array(
				'label'           	=> esc_html__( 'Picture Source', 'dicm_divi_custom_modules' ),
				'type'            	=> 'text',
				'option_category' 	=> 'configuration',
				'description'     	=> esc_html__( 'Input image source.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     	=> 'input_information',
			),

			// Show information tab
			'show_fav_icon' => array(
				'label'           => esc_html__( 'Show Favorite Icon', 'dicm_divi_custom_modules' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'description'     => esc_html__( 'Favorite icon will show or not.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     => 'show_infomation',
				'options'         => array(
					'off'  	=> esc_html__( 'Off', 'dicm_divi_custom_modules' ),
					'on' 		=> esc_html__( 'On', 'dicm_divi_custom_modules' ),
				),
				'default'					=> 'on',
			),
			'show_main_title' => array(
				'label'           => esc_html__( 'Show Main Title', 'dicm_divi_custom_modules' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'description'     => esc_html__( 'Main title will show or not.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     => 'show_infomation',
				'options'         => array(
					'off'  	=> esc_html__( 'Off', 'dicm_divi_custom_modules' ),
					'on' 		=> esc_html__( 'On', 'dicm_divi_custom_modules' ),
				),
				'default'					=> 'on',
			),
			'show_sub_title' => array(
				'label'           => esc_html__( 'Show Sub Title', 'dicm_divi_custom_modules' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'description'     => esc_html__( 'Sub title will show or not.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     => 'show_infomation',
				'options'         => array(
					'off'  	=> esc_html__( 'Off', 'dicm_divi_custom_modules' ),
					'on' 		=> esc_html__( 'On', 'dicm_divi_custom_modules' ),
				),
				'default'					=> 'on',
			),
			'show_extra_info' => array(
				'label'           => esc_html__( 'Show Extra Info', 'dicm_divi_custom_modules' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'description'     => esc_html__( 'Main title will show or not.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     => 'show_infomation',
				'options'         => array(
					'off'  	=> esc_html__( 'Off', 'dicm_divi_custom_modules' ),
					'on' 		=> esc_html__( 'On', 'dicm_divi_custom_modules' ),
				),
				'default'					=> 'on',
			),
			'show_sport_icon' => array(
				'label'           => esc_html__( 'Show Sport Icon', 'dicm_divi_custom_modules' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'description'     => esc_html__( 'Sport icon will show or not.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     => 'show_infomation',
				'options'         => array(
					'off'  	=> esc_html__( 'Off', 'dicm_divi_custom_modules' ),
					'on' 		=> esc_html__( 'On', 'dicm_divi_custom_modules' ),
				),
				'default'					=> 'on',
			),
			
			// Alignment tab
			'info_text_pos' => array(
				'label'           => esc_html__( 'Entire Info Position', 'dicm_divi_custom_modules' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'					=> array(
					'top-info'		=> esc_html__( 'Top', 'dicm_divi_custom_modules' ),
					'bottom-info'	=> esc_html__( 'Bottom', 'dicm_divi_custom_modules' ),
				),
				'default_on_front'=> 'top-info',
				'description'     => esc_html__( 'Picture will show top or bottom of tile info.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     => 'alignment',
			),
			'extra_info_pos' 	=> array(
				'label'           => esc_html__( 'Extra Info Position', 'dicm_divi_custom_modules' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'					=> array(
					'extrainfo-pos-bottom'		=> esc_html__( 'Top', 'dicm_divi_custom_modules' ),
					'extrainfo-pos-top'	=> esc_html__( 'Bottom', 'dicm_divi_custom_modules' ),
				),
				'default_on_front'=> 'top-info',
				'description'     => esc_html__( 'Extra info will show top or bottom.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     => 'alignment',
				'show_if'   			=> array( 'show_extra_info' => 'on'),
			),

			// Size tab
			'size_type' => array(
				'label'           => esc_html__( 'Size Type', 'dicm_divi_custom_modules' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'					=> array(
					'fixed-height'		=> esc_html__( 'Fixed Height', 'dicm_divi_custom_modules' ),
					'fixed-width'			=> esc_html__( 'Fixed Width', 'dicm_divi_custom_modules' ),
					'both'						=> esc_html__( 'Fixed Width & Height', 'dicm_divi_custom_modules' ),
				),
				'default_on_front'=> 'fixed-height',
				'description'     => esc_html__( 'Select info here will appear inside the module.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     => 'size',
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

			// Preload animation tab
			'animation_type' => array(
				'label'           => esc_html__( 'Type', 'dicm_divi_custom_modules' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'					=> array(
					'1'		=> esc_html__( '1', 'dicm_divi_custom_modules' ),
					'2'			=> esc_html__( '2', 'dicm_divi_custom_modules' ),
					'3'						=> esc_html__( '3', 'dicm_divi_custom_modules' ),
				),
				'default'=> '1',
				'description'     => esc_html__( 'Select preload animation.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     => 'preload_animation',
			),

			// Extra setting tab
			'use_instogram' => array(
				'label'           		=> esc_html__( 'Use Instogram For Empty Photo', 'dicm_divi_custom_modules' ),
				'type'            		=> 'yes_no_button',
				'option_category' 		=> 'configuration',
				'description'     		=> esc_html__( 'Use instogram for empty photo.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     		=> 'extra_setting',
				'options'         		=> array(
					'off'  	=> esc_html__( 'Off', 'dicm_divi_custom_modules' ),
					'on' 		=> esc_html__( 'On', 'dicm_divi_custom_modules' ),
				),
				'default'							=> 'on',
			),
		);
	}

	/**
	 * Module's advanced fields configuration
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	function get_advanced_fields_config() {
		return array(
			'button' => array(
				'button' => array(
					'label' => esc_html__( 'Button', 'et_builder' ),
				),
			),
		);
	}

	/**
	 * Module's advanced fields configuration
	 *
	 * @return array
	 */
	function get_tile_html($entireInfoPos, 
									$sizeType, 
									$showSportIconStyle, 
									$extraInfoPos, 
									$showFavoriteIconStyle, 
									$showMainTitleStyle,
									$favor_img_src, 
									$mainTitle, 
									$sport_img_src, 
									$extraInfo, 
									$profile_img_src) {
		$output = 
			'<div class="deeds-tile ' . $entireInfoPos . ' ' . $sizeType . ' ' . $showSportIconStyle . '">
	      <div class="deeds-tile-desc ' . $extraInfoPos . '">
	        <div class="deeds-tile-row">
	          <div class="deeds-tile-fav">
	            <button class="simplefavorite-button">
	              <img class="favor_img ' . $showFavoriteIconStyle . '" src="' . $favor_img_src . '" />
	            </button>
	          </div>
	          <div class="deeds-tile-maintitle ' . $showMainTitleStyle . '">
	            <a href="#">
	              <span>' . $mainTitle . '</span>
	            </a>
	          </div>
	          <div class="tile-sport">
	            <a href="#">
	              <img src="' . $sport_img_src . '" alt="Kayaking">
	            </a>
	          </div>
	        </div>
	        <div class="deeds-tile-row">
	          <div class="tile-desc-info ">
	            <a href="#">
	              <span>' . $extraInfo . '</span>
	            </a>
	          </div>
	        </div>
	      </div>
	      <div class="deeds-tile-row-profile-img">
	        <a href="#" class="deeds-tile-row">
	          <img id="Doguetebmx" src="' . $profile_img_src . '">
	        </a>
	      </div>
	    </div>';

	  return $output;
	}

	function get_tile_js($entireInfoPos, 
									$sizeType, 
									$showSportIconStyle, 
									$extraInfoPos, 
									$showFavoriteIconStyle, 
									$showMainTitleStyle,
									$favor_img_src, 
									$mainTitle, 
									$sport_img_src, 
									$extraInfo, 
									$profile_img_src) {
		$javascript = "
			data.results.hits.forEach(function(hit, index, array) {
				is_empty = 0;
	      var profile_img = hit.".$profile_img_src."
	        ? hit.".$profile_img_src."
	        : 'https://devdemodeeds.wpengine.com/wp-content/uploads/2019/01/EmptyFace.png';
	      \$hits.push(
	        '<div class=\"deeds-tile " . $entireInfoPos . ' ' . $sizeType . ' ' . $showSportIconStyle . "\">' +
			      '<div class=\"deeds-tile-desc " . $extraInfoPos . "\">' +
			        '<div class=\"deeds-tile-row\">' +
			          '<div class=\"deeds-tile-fav\">' +
			            '<button class=\"simplefavorite-button\">' +
			              '<img class=\"favor_img " . $showFavoriteIconStyle . "\" src=\"" . $favor_img_src . "\" />' +
			            '</button>' +
			          '</div>' +
			          '<div class=\"deeds-tile-maintitle " . $showMainTitleStyle . "\">' +
			            '<a href=\"#\">' +
			              '<span>' + hit.".$mainTitle." + '</span>' +
			            '</a>' +
			          '</div>' +
			          '<div class=\"tile-sport\">' +
			            '<a href=\"#\">' +
			              '<img src=\"" . $sport_img_src . "\" alt=\"Kayaking\">' +
			            '</a>' +
			          '</div>' +
			        '</div>' +
			        '<div class=\"deeds-tile-row\">' +
			          '<div class=\"tile-desc-info\">' +
			            '<a href=\"#\">' +
			              '<span>' + hit." . $extraInfo . " + '</span>' +
			            '</a>' +
			          '</div>' +
			        '</div>' +
			      '</div>' +
			      '<div class=\"deeds-tile-row-profile-img\">' +
			        '<a href=\"#\" class=\"deeds-tile-row\">' +
			          '<img id=\"Doguetebmx\" src=\"' + profile_img + '\">' +
			        '</a>' +
			      '</div>' +
			    '</div>'
	      );
	    });
		";
		return $javascript;
	}

	/**
	 * Module's advanced fields configuration
	 *
	 * @return array
	 */
	function get_html_with_js() {
		// get att value from parent module
		$parent_module = self::get_parent_modules('page')['dicm_parent'];
		$pcontainer_id = $parent_module->shortcode_atts['container_id'];
		$useAlgolia = $parent_module->shortcode_atts['use_algolia'];

		// input information tab
		$mainTitle = $this->props['main_title'];
		$subTitle = $this->props['sub_title'];
		$extraInfo = $this->props['extra_info'];
		$useAlgoliaField = $useAlgolia;
		$profile_img_src = $this->props['img_src'];
		
		// show information
		$showFavoriteIcon = $this->props['show_fav_icon'];
		$showMainTitle = $this->props['show_main_title'];
		$showSubTitle = $this->props['show_sub_title'];
		$showExtraInfo = $this->props['show_extra_info'];
		$showSportIcon = $this->props['show_sport_icon'];

		// alignment tab
		$entireInfoPos = $this->props['info_text_pos'];
		if ($showExtraInfo == 'on')
			$extraInfoPos = $this->props['extra_info_pos'];
		else
			$extraInfoPos = 'main-info';
		
		// size tab
		$sizeType = $this->props['size_type'];

		// could image tab
		$useCloudImage = $this->props['use_resp_js_cloud_img'];
		$respJSCloudRatio = $this->props['resp_js_cloud_ratio'];
		$loadInit = $this->props['load_init'];
		$respInitAgain = $this->props['resp_init_again_call_delay'];

		// preload animation tab
		$preloadAnimationType = $this->props['animation_type'];

		// extra setting tab
		$useInstogram = $this->props['use_instogram'];

		$showMainTitleStyle = ( $showMainTitle == 'on' ? '' : 'hide-main-title');
		$showSubTitleStyle = ( $showSubTitle == 'on' ? '' : 'hide-sub-title');
		$showSportIconStyle = ( $showSportIcon == 'on' ? '' : 'hide-sport-icon');
		$showFavoriteIconStyle = ( $showFavoriteIcon == 'on' ? '' : 'hide-favorite-icon');


		$sport_img_src = 'https://devdeeds.wpengine.com/wp-content/uploads/2019/04/kayaking-blue.svg';
		$favor_img_src = 'https://devdeeds.wpengine.com/wp-content/uploads/2019/03/favorite-icon-empty.svg';
		
		// load javascript
		wp_enqueue_style( 'tile-style', plugins_url('/divi-extension-example-master/styles/deeds-tile.css') );
		wp_register_script( 'test-child-register', plugins_url('/divi-extension-example-master/test-child.js'));
		wp_enqueue_script( 'test-child-divi-module', plugins_url('/divi-extension-example-master/test-child.js'), array('test-child-register'));
		wp_localize_script( 'test-child-divi-module', 'testChildSettings', array('test-string' => $pcontainer_id,));
		wp_print_scripts( 'test-child-divi-module');

		$html = $this->get_tile_html(
			$entireInfoPos, 
			$sizeType, 
			$showSportIconStyle, 
			$extraInfoPos, 
			$showFavoriteIconStyle, 
			$showMainTitleStyle,
			$favor_img_src, 
			$mainTitle, 
			$sport_img_src, 
			$extraInfo, 
			$profile_img_src
		);
		
		$javascript = $this->get_tile_js(
			$entireInfoPos, 
			$sizeType, 
			$showSportIconStyle, 
			$extraInfoPos, 
			$showFavoriteIconStyle, 
			$showMainTitleStyle,
			$favor_img_src, 
			$mainTitle, 
			$sport_img_src, 
			$extraInfo, 
			$profile_img_src
		);
		return ($useAlgoliaField === 'off' ? $html : $javascript);
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
		$useAlgolia = $this->props['use_algolia_field'];

		// Render module content
		if ($useAlgolia === 'off'){
			echo "off";
			return sprintf(
				'<div class="dicm-content">%1$s</div>',
				$this->get_html_with_js()
			);	
		} else {
			return sprintf(
				'%1$s',
				$this->get_html_with_js()
			);
		}
		
	}
}

new DICM_Child;
