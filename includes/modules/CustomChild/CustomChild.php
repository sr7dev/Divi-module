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
					'preload_animation'				=> esc_html( 'Preload Animation', 'dicm-divi-custom-modules' ),
					'extra_setting'						=> esc_html( 'Extra Setting', 'dicm-divi-custom-modules' ),
				),
			),
		);

		$this->main_css_element = '%%order_class%%.deeds-tile .deeds-tile-row-profile-img';

		$this->custom_css_fields = array(
			'promo_tile' => array(
				'label'    => esc_html__( 'Tile', 'et_builder' ),
				'selector' => '%%order_class%% .deeds-tile-row-profile-img',
			),
			'promo_profile' => array(
					'label'    => esc_html__( 'Profile', 'et_builder' ),
					'selector' => '%%order_class%% .deeds-tile-row-profile-img',
			),
			'promo_profile_ci_wrapper' => array(
					'label'    => esc_html__( 'Wrapper of cloud image of Profile', 'et_builder' ),
					'selector' => '%%order_class%% .deeds-tile-row-profile-img .ci-image-wrapper',
			),
			'promo_profile_img' => array(
					'label'    => esc_html__( 'Image tag of Profile', 'et_builder' ),
					'selector' => '%%order_class%% .deeds-tile-row-profile-img img',
			),
			'promo_information' => array(
				'label'    => esc_html__( 'Information', 'et_builder' ),
				'selector' => '%%order_class%% .deeds-tile-desc',
			),
			'promo_main_sub_title' => array(
				'label'    => esc_html__( 'Main & Sub Title', 'et_builder' ),
				'selector' => '%%order_class%% .deeds-tile-maintitle',
			),
			'promo_main_title' => array(
				'label'    => esc_html__( 'Main Title', 'et_builder' ),
				'selector' => '%%order_class%% .deeds-tile-maintitle h2',
			),
			'promo_sub_title' => array(
					'label'    => esc_html__( 'Sub Title', 'et_builder' ),
					'selector' => '%%order_class%%  .deeds-tile-maintitle h3',
			),
			'promo_extra_title' => array(
					'label'    => esc_html__( 'Extra Title', 'et_builder' ),
					'selector' => '%%order_class%% .tile-desc-info',
			),
			'promo_fav_button' => array(
				'label'    => esc_html__( 'Favorite Button', 'et_builder' ),
				'selector' => '%%order_class%% .simplefavorite-button',
			),
			'promo_fav_button_img' => array(
				'label'    => esc_html__( 'Image of Favorite Button', 'et_builder' ),
				'selector' => '%%order_class%% .simplefavorite-button img',
			),
			'promo_sport' => array(
				'label'    => esc_html__( 'Sport DIV', 'et_builder' ),
				'selector' => '%%order_class%% .tile-sport',
				'no_space_before_selector' => true,
			),
			'promo_sport_img' => array(
				'label'    => esc_html__( 'Sport Icon', 'et_builder' ),
				'selector' => '%%order_class%% .tile-sport img',
				'no_space_before_selector' => true,
			),
		);

	}

	public function get_custom_css_fields_config()
	{
		return array(
			'promo_tile' => array(
				'label'    => esc_html__( 'Tile', 'et_builder' ),
				'selector' => '%%order_class%% .deeds-tile-row-profile-img',
			),
			'promo_profile' => array(
					'label'    => esc_html__( 'Profile', 'et_builder' ),
					'selector' => '%%order_class%% .deeds-tile-row-profile-img',
			),
			'promo_profile_ci_wrapper' => array(
					'label'    => esc_html__( 'Wrapper of cloud image of Profile', 'et_builder' ),
					'selector' => '%%order_class%% .deeds-tile-row-profile-img .ci-image-wrapper',
			),
			'promo_profile_img' => array(
					'label'    => esc_html__( 'Image tag of Profile', 'et_builder' ),
					'selector' => '%%order_class%% .deeds-tile-row-profile-img img',
			),
			'promo_information' => array(
				'label'    => esc_html__( 'Information', 'et_builder' ),
				'selector' => '%%order_class%% .deeds-tile-desc',
			),
			'promo_main_sub_title' => array(
				'label'    => esc_html__( 'Main & Sub Title', 'et_builder' ),
				'selector' => '%%order_class%% .deeds-tile-maintitle',
			),
			'promo_main_title' => array(
				'label'    => esc_html__( 'Main Title', 'et_builder' ),
				'selector' => '%%order_class%% .deeds-tile-maintitle h2',
			),
			'promo_sub_title' => array(
					'label'    => esc_html__( 'Sub Title', 'et_builder' ),
					'selector' => '%%order_class%%  .deeds-tile-maintitle h3',
			),
			'promo_extra_title' => array(
					'label'    => esc_html__( 'Extra Title', 'et_builder' ),
					'selector' => '%%order_class%% .tile-desc-info',
			),
			'promo_fav_button' => array(
				'label'    => esc_html__( 'Favorite Button', 'et_builder' ),
				'selector' => '%%order_class%% .simplefavorite-button',
			),
			'promo_fav_button_img' => array(
				'label'    => esc_html__( 'Image of Favorite Button', 'et_builder' ),
				'selector' => '%%order_class%% .simplefavorite-button img',
			),
			'promo_sport' => array(
				'label'    => esc_html__( 'Sport DIV', 'et_builder' ),
				'selector' => '%%order_class%% .tile-sport',
				'no_space_before_selector' => true,
			),
			'promo_sport_img' => array(
				'label'    => esc_html__( 'Sport Icon', 'et_builder' ),
				'selector' => '%%order_class%% .tile-sport img',
				'no_space_before_selector' => true,
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
				'options'         	=> array(
					'off'  	=> esc_html__( 'Off', 'dicm_divi_custom_modules' ),
					'on' 		=> esc_html__( 'On', 'dicm_divi_custom_modules' ),
				),
				'toggle_slug'     	=> 'input_information',
				'tab_slug'		  		=> 'general',
			),
			'use_special_main_title' => array(
				'label'           	=> esc_html__( 'Use Special Main Title', 'dicm_divi_custom_modules' ),
				'type'            	=> 'yes_no_button',
				'option_category' 	=> 'configuration',
				'description'     	=> esc_html__( 'Special main title field will use or not.', 'dicm_divi_custom_modules' ),
				'options'         	=> array(
					'off'  	=> esc_html__( 'Off', 'dicm_divi_custom_modules' ),
					'on' 		=> esc_html__( 'On', 'dicm_divi_custom_modules' ),
				),
				'toggle_slug'     	=> 'input_information',
				'default'						=> 'off',
			),
			'main_title' => array(
				'label'           	=> esc_html__( 'Main Title', 'dicm_divi_custom_modules' ),
				'type'            	=> 'text',
				'option_category' 	=> 'configuration',
				'description'     	=> esc_html__( 'Input main title.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     	=> 'input_information',
				'show_if'   				=> array(
					'use_special_main_title' => 'off'
				),
			),
			'special_main_title' => array(
				'label'           	=> esc_html__( 'Special Main Title', 'dicm_divi_custom_modules' ),
				'type'              => 'select',
				'option_category'   => 'layout',
				'options'           => array(
					'first_name'  => esc_html__( 'First Name', 'et_builder' ),
					'last_name' 	=> esc_html__( 'Last Name', 'et_builder'),
					'event_date' 	=> esc_html__( 'Event Date', 'et_builder' ),
				),	
				'description'     	=> esc_html__( 'Input special main title.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     	=> 'input_information',
				'default'					=> 'first_name',
				'show_if'   				=> array(
					'use_algolia_field' 	=> 'on',
					'use_special_main_title' => 'on'
				),
			),
			'use_special_sub_title' => array(
				'label'           	=> esc_html__( 'Use Special Sub Title', 'dicm_divi_custom_modules' ),
				'type'            	=> 'yes_no_button',
				'option_category' 	=> 'configuration',
				'description'     	=> esc_html__( 'Special sub title field will use or not.', 'dicm_divi_custom_modules' ),
				'options'         	=> array(
					'off'  	=> esc_html__( 'Off', 'dicm_divi_custom_modules' ),
					'on' 		=> esc_html__( 'On', 'dicm_divi_custom_modules' ),
				),
				'toggle_slug'     	=> 'input_information',
				'default'						=> 'off',
			),
			'sub_title' => array(
				'label'           	=> esc_html__( 'Sub Title', 'dicm_divi_custom_modules' ),
				'type'            	=> 'text',
				'option_category' 	=> 'configuration',
				'description'     	=> esc_html__( 'Input sub title.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     	=> 'input_information',
				'show_if'   				=> array(
					'use_special_sub_title' => 'off'
				),
			),
			'special_sub_title' => array(
				'label'           	=> esc_html__( 'Special Sub Title', 'dicm_divi_custom_modules' ),
				'type'              => 'select',
				'option_category'   => 'layout',
				'options'           => array(
					'first_name'  => esc_html__( 'First Name', 'et_builder' ),
					'last_name' 	=> esc_html__( 'Last Name', 'et_builder'),
					'event_date' 	=> esc_html__( 'Event Date', 'et_builder' ),
				),	
				'description'     	=> esc_html__( 'Input special sub title.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     	=> 'input_information',
				'default'						=> 'last_name',
				'show_if'   				=> array(
					'use_algolia_field' 	=> 'on',
					'use_special_sub_title' => 'on'
				),
			),
			'use_special_extra_info' => array(
				'label'           	=> esc_html__( 'Use Special Extra Info', 'dicm_divi_custom_modules' ),
				'type'            	=> 'yes_no_button',
				'option_category' 	=> 'configuration',
				'description'     	=> esc_html__( 'Special Extra Info will use or not.', 'dicm_divi_custom_modules' ),
				'options'         	=> array(
					'off'  	=> esc_html__( 'Off', 'dicm_divi_custom_modules' ),
					'on' 		=> esc_html__( 'On', 'dicm_divi_custom_modules' ),
				),
				'toggle_slug'     	=> 'input_information',
				'default'						=> 'off',
			),
			'extra_info' => array(
				'label'           	=> esc_html__( 'Extra Info', 'dicm_divi_custom_modules' ),
				'type'            	=> 'text',
				'option_category' 	=> 'configuration',
				'description'     	=> esc_html__( 'Input extra info.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     	=> 'input_information',
				'show_if'   				=> array(
					'use_special_extra_info' => 'off'
				),
			),
			'special_extra_info' => array(
				'label'           	=> esc_html__( 'Special Extra Info', 'dicm_divi_custom_modules' ),
				'type'              => 'select',
				'option_category'   => 'layout',
				'options'           => array(
					'first_name'  => esc_html__( 'First Name', 'et_builder' ),
					'last_name' 	=> esc_html__( 'Last Name', 'et_builder'),
					'event_date' 	=> esc_html__( 'Event Date', 'et_builder' ),
				),	
				'description'     	=> esc_html__( 'Input special extra info.', 'dicm_divi_custom_modules' ),
						'toggle_slug'     	=> 'input_information',
						'default'						=> 'last_name',
						'show_if'   				=> array(
							'use_algolia_field' 	=> 'on',
							'use_special_extra_info' => 'on'
				),
			),
			'use_spec_profile_img' => array(
				'label'           	=> esc_html__( 'Use Special Profile Image', 'dicm_divi_custom_modules' ),
				'type'            	=> 'yes_no_button',
				'option_category' 	=> 'configuration',
				'description'     	=> esc_html__( 'Special Profile Image will use or not.', 'dicm_divi_custom_modules' ),
				'options'         	=> array(
					'off'  	=> esc_html__( 'Off', 'dicm_divi_custom_modules' ),
					'on' 	=> esc_html__( 'On', 'dicm_divi_custom_modules' ),
				),
				'toggle_slug'     	=> 'input_information',
				'default'						=> 'off',
			),
			'img_src' => array(
				'label'           	=> esc_html__( 'Picture Source', 'dicm_divi_custom_modules' ),
				'type'            	=> 'text',
				'option_category' 	=> 'configuration',
				'description'     	=> esc_html__( 'Input image source.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     	=> 'input_information',
				'default'			=> 'profile_img',
				'show_if'   				=> array(
					'use_spec_profile_img' => 'off'
				),
			),
			'spec_img_src' => array(
				'label'           	=> esc_html__( 'Special Profile Image', 'dicm_divi_custom_modules' ),
				'type'              => 'select',
				'option_category'   => 'layout',
				'options'           => array(
					'youtube_thumbnail'	=> esc_html__( 'Youtube Thumbnail', 'et_builder' ),
					'youtube_video'		=> esc_html__( 'Youtube Video', 'et_builder'),
					'media_profile'		=> esc_html__( 'Media Profile', 'et_builder' ),
				),	
				'description'     	=> esc_html__( 'Input special extra info.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     	=> 'input_information',
				'default'			=> 'youtube_thumbnail',
				'show_if'   				=> array(
					'use_algolia_field' 	=> 'on',
					'use_spec_profile_img' 	=> 'on'
				),
			),
			'empty_img' => array(
				'label'           	=> esc_html__( 'Empty Image', 'dicm_divi_custom_modules' ),
				'type'            	=> 'text',
				'option_category' 	=> 'configuration',
				'description'     	=> esc_html__( 'Show image if empty image source.\n You can use \'sport\' or \'sports\' for using sport image for empty tile.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     	=> 'input_information',
				'default_on_front'	=> 'sports',
				'show_if'   				=> array( 'use_algolia_field' 	=> 'on'),
			),
			'link' => array(
				'label'           	=> esc_html__( 'Link', 'dicm_divi_custom_modules' ),
				'type'            	=> 'text',
				'option_category' 	=> 'configuration',
				'description'     	=> esc_html__( 'Link.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     	=> 'input_information',
				'default'						=> 'permalink'
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

			// Preload animation tab
			'animation_type' => array(
				'label'             => esc_html__( 'Type of Preload Animation', 'et_builder' ),
				'type'              => 'select',
				'option_category'   => 'layout',
				'options'           => array(
					'none'  => esc_html__( 'None', 'et_builder' ),
					'imgfile' => esc_html__( 'Image file', 'et_builder'),
					'rotateplane' => esc_html__( 'Rotate plane', 'et_builder' ),
					'double-bounce' => esc_html__( 'Double Bounce', 'et_builder'),
					'cube' => esc_html__( 'Cube', 'et_builder'),
					'scaleout' => esc_html__( 'Scale Out', 'et_builder'),
					'dot' => esc_html__( 'Dot', 'et_builder'),
					'bounce' => esc_html__( 'Bounce', 'et_builder'),
					'sk-circle' => esc_html__( 'SK Circle', 'et_builder'),
					'sk-cube-grid' => esc_html__( 'SK Cube Grid', 'et_builder'),
					'sk-fading-circle' => esc_html__( 'Sk-Fading-Circle', 'et_builder'),
					'sk-cube' => esc_html__( 'SK Cube', 'et_builder'),
				),
				'description'        => esc_html__( 'Select Type of Preload Animation', 'et_builder' ),
				'default_on_front'   => 'bounce',
				/*'show_if' => array(
				  'parentModule:use_resp_js_cloud_img'=> array('on'),
				),*/
				'toggle_slug'     => 'preload_animation',
				'tab_slug'        	=> 'general',
			),

			// Extra setting tab
			'use_Instagram' => array(
				'label'           		=> esc_html__( 'Use Instagram For Empty Photo', 'dicm_divi_custom_modules' ),
				'type'            		=> 'yes_no_button',
				'option_category' 		=> 'configuration',
				'description'     		=> esc_html__( 'Use Instagram for empty photo.', 'dicm_divi_custom_modules' ),
				'toggle_slug'     		=> 'extra_setting',
				'options'         		=> array(
					'off'  	=> esc_html__( 'Off', 'dicm_divi_custom_modules' ),
					'on' 		=> esc_html__( 'On', 'dicm_divi_custom_modules' ),
				),
				'default'				=> 'on',
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
			'text'           => false,
			'background'     => array(
				'options' => array(
					'background_color' => array(
						'default'          => et_builder_accent_color(),
					),
				),
				'css'		=> array (
					'main' => '%%order_class%%.deeds-tile',
					),
			),
			'borders'        => array(
				'default' => array(
					'css'      => array(
						'main' => array (
							'border_radii' => '%%order_class%%.deeds-tile',
							'border_styles' => '%%order_class%%.deeds-tile',
						)
					),
					'defaults' => array(
						'border_radii' => 'on|3px|3px|3px|3px',
					),
				),
			),
			'box_shadow'     => array(
				'default' => array(
					'css' => array(
						'main' => '%%order_class%%.deeds-tile',
					),
				),
			),
			'filters'        => array(
				'child_filters_target' => array(
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'image',
				),
				'css'                  => array(
					'main' => '%%order_class%%.deeds-tile',
				),
			),
			'fonts'          => array(
				'header2' => array(
					'css'          => array(
						'main'      => "%%order_class%%.deeds-tile h2",
						'important' => 'all',
					),
					'label'        => esc_html__( 'Main Title', 'deeds-tile' ),
					'disable_toggle' => false,
				),
				'header3' => array(
					'css'          => array(
						'main'      => "%%order_class%%.deeds-tile h3",
						'important' => 'all',
					),
					'label'        => esc_html__( 'Sub Title', 'deeds-tile' ),
					'disable_toggle' => false,
				),
				'body' => array(
					'css'          => array(
						'main'      => "%%order_class%%.deeds-tile p",
						'important' => 'all',
					),
					'label'        => esc_html__( 'Extra Title', 'deeds-tile' ),
					'disable_toggle' => false,
				),
			),
			'margin_padding' => array(
				'css' => array(
					'main' => "%%order_class%%.deeds-tile",
					'important' => 'all',
				),
			),
			'max_width'      => array(
				'toggle_title'    => esc_html__( 'Profile Image Size', 'deeds-tile'),
				'css' => array(
					'main' => "%%order_class%%.deeds-tile .deeds-tile-row-profile-img",
					'important' => 'all',
				),
			),
		);
	}

	/**
	 * Module's advanced fields configuration
	 *
	 * @return array
	 */
	function get_tile_html(
		$module_class,
		$entireInfoPos, 
		$sizeType, 
		$showSportIconStyle, 
		$extraInfoPos, 
		$showFavoriteIconStyle, 
		$showMainTitleStyle,
		$favor_img_src, 
		$mainTitle, 
		$link,
		$sport_img_src, 
		$extraInfo, 
		$profile_img_src) {
		$output = 
			'<div class="deeds-tile ' . $module_class.  ' '. $entireInfoPos . ' ' . $sizeType . ' ' . $showSportIconStyle . '">
				<div class="deeds-tile-desc ' . $extraInfoPos . '">
					<div class="deeds-tile-row">
					<div class="deeds-tile-fav">
						<button class="simplefavorite-button">
						<img class="favor_img ' . $showFavoriteIconStyle . '" src="' . $favor_img_src . '" />
						</button>
					</div>
					<div class="deeds-tile-maintitle ' . $showMainTitleStyle . '">
						<a href="' . $link . '">
						<span>' . $mainTitle . '</span>
						</a>
					</div>
					<div class="tile-sport">
						<a href="' . $link . '">
						<img src="' . $sport_img_src . '" alt="Kayaking">
						</a>
					</div>
					</div>
					<div class="deeds-tile-row">
					<div class="tile-desc-info ">
						<a href="' . $link . '">
						<span>' . $extraInfo . '</span>
						</a>
					</div>
					</div>
				</div>
				<div class="deeds-tile-row-profile-img">
					<a href="' . $link . '" class="deeds-tile-row">
					<img class="profile-size" src="' . $profile_img_src . '">
					</a>
				</div>
			</div>';

	  	return $output;
	}
	function get_algolia_field($use_special_field, $common_field, $special_field ) {
		if ($use_special_field == 'on' ) {
			
			return $special_field ? $special_field : '""';
		} else {

			return $common_field ? 'hit.'.$common_field : '""';
		}

	}
	function get_tile_js(
		$module_class,
		$entireInfoPos, 
		$sizeType, 
		$showSportIconStyle, 
		$extraInfoPos, 
		$showFavoriteIconStyle, 
		$showMainTitleStyle,
		$favor_img_src, 
		$useSpecialMainTitle, 
		$mainTitle,
		$specialMainTitle,
		$useSpecialSubTitle,
		$subTitle,
		$specialSubTitle,
		$link, 
		$sport_img_src,
		$useSpecialextraInfo,
		$extraInfo,
		$specialextraInfo, 
		$useSpecProfileImg,
		$profile_img_src,
		$specProfileImg,
		$emptyImage, 
		$instantSearch,
		$container_id,
		$useCloudImage,
		$respJSCloudRatio,
		$preload_type,
		$useInstagram) {
		global $cloudimg_using, $cloudimg_url_prefix, $cloudimg_operation, $cloudimg_token, $cloudimg_width, $cloudimg_height, $cloudimg_filter;
		$respInitDelay = $this->props['resp_init_again_call_delay'];
		
		$javascript = "
			{CHILD_JS_START}
			data.results.hits.forEach(function(hit, index, array) {
				is_empty = 0;
				var instagram_uername= ".($useInstagram ? "lastWordCapitalized(hit.instagramurl)" : "''").";
				var is_fav = hit.favorite_users && (hit.favorite_users.indexOf(user_id) >=0 )? 1 : 0;
				var favor_img_html = get_favbutton_html_by_instant2(user_id, " .$instantSearch. ", hit.objectID, is_fav);
				var sport_img = get_blue_sport_img(get_hit_sport(hit));
				var hit_img = '" .$useSpecProfileImg. "' === 'off' ? hit.".$profile_img_src.": hit." .$specProfileImg. ";
				var hit_empty_img = '".$emptyImage."';
				var link = ".( $link ? "hit.".$link : "''" ).";
				var first_name = '';
				var last_name = '';
				var event_date = '';

				if ( hit.post_title ) {
					var lastIndex = hit.post_title.lastIndexOf(' ');
					first_name = hit.post_title.substring(0, lastIndex);
					last_name = remove_first_occurrence(hit.post_title, first_name);
				}

				if (hit.start && hit.end) {
					event_date = (hit.start == hit.end ? 
						deeds_date_format(hit.start) :
						deeds_date_format(hit.start) + ' - ' + deeds_date_format(hit.end));
				}
				if ( hit_empty_img == 'sports' || hit_empty_img == 'sport')
				{
					hit_empty_img = sport_img;
				}
				var hit_img_html = get_hit_img_html(
					hit,
					hit_img,
					hit_empty_img,
					'".$preload_type."',
					'".($useCloudImage == "on" ? "1" : "0")."',
					'".($respJSCloudRatio ? $respJSCloudRatio : "") ."',
					instagram_uername);
				
				\$hits.push(
					'<div class=\"deeds-tile " . $module_class. ' '. $entireInfoPos . ' ' . $sizeType . ' ' . $showSportIconStyle . "\">' +
						'<div class=\"deeds-tile-desc " . $extraInfoPos . "\">' +
							'<div class=\"deeds-tile-row\">' +
								'<div class=\"deeds-tile-fav " . $showFavoriteIconStyle . "\">' +
									favor_img_html +
								'</div>' +
								'<div class=\"deeds-tile-maintitle " . $showMainTitleStyle . "\">' +
									'<a href=\"' + link + '\">' +
									'<h2>' + ". $this->get_algolia_field($useSpecialMainTitle, $mainTitle, $specialMainTitle) . " + '</h2>' +
									'<h3>' + ". $this->get_algolia_field($useSpecialSubTitle, $subTitle, $specialSubTitle) . " + '</h3>' +
									'</a>' +
								'</div>' +
								'<div class=\"tile-sport\">' +
									'<a href=\"' + link + '\">' +
									'<img src=\"' + sport_img + '\" alt=\"' + get_hit_sport(hit) + '\">' +
									'</a>' +
								'</div>' +
							'</div>' +
							'<div class=\"deeds-tile-row\">' +
								'<div class=\"tile-desc-info\">' +
									'<a href=\"' + link + '\">' +
									'<p>' +". $this->get_algolia_field($useSpecialextraInfo, $extraInfo, $specialextraInfo) . " + '</p>' +
									'</a>' +
								'</div>' +
							'</div>' +
						'</div>' +
						'<div class=\"deeds-tile-row-profile-img\">' +
							'<a href=\"' + link + '\" class=\"deeds-tile-row\">' +
								hit_img_html +
							'</a>' +
						'</div>' +
					'</div>'
				);

			});
			{CHILD_JS_END}
		";
		return $javascript;
	}

	function get_html_with_js($module_class) {
		global $cloudimg_using, $cloudimg_url_prefix, $cloudimg_operation, $cloudimg_token, $cloudimg_width, $cloudimg_height, $cloudimg_filter;

		// get att value from parent module
		$parent_module = self::get_parent_modules('page')['dicm_parent'];
		$pcontainer_id = $parent_module->shortcode_atts['container_id'];
		$pinstantSearch = $parent_module->shortcode_atts['instantsearch'];
		$puseAlgolia = $parent_module->shortcode_atts['use_algolia'];
		$respJSCloudRatio = $parent_module->shortcode_atts['resp_js_cloud_ratio'];
		$puseCloudImage = $parent_module->shortcode_atts['use_resp_js_cloud_img'];

		// input information tab
		$mainTitle = $this->props['main_title'];
		$subTitle = $this->props['sub_title'];
		$extraInfo = $this->props['extra_info'];
		$useAlgoliaField = $puseAlgolia;
		$useSpecProfileImg = $this->props['use_spec_profile_img'];
		$profile_img_src = $this->props['img_src'];
		$specProfileImg = $this->props['spec_img_src'];
		$emptyImage = $this->props['empty_img'];
		$link = $this->props['link'];
		$useSpecialMainTitle = $this->props['use_special_main_title'];
		$specialMainTitle = $this->props['special_main_title'];
		$useSpecialSubTitle = $this->props['use_special_sub_title'];
		$specialSubTitle = $this->props['special_sub_title'];
		$useSpecialextraInfo = $this->props['use_special_extra_info'];
		$specialextraInfo = $this->props['special_extra_info'];
		
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

		
		// preload animation tab
		$preloadAnimationType = $this->props['animation_type'];

		// extra setting tab
		$useInstagram = $this->props['use_Instagram'];

		// 
		$showMainTitleStyle = ( $showMainTitle == 'on' ? '' : 'hide-main-title');
		$showSubTitleStyle = ( $showSubTitle == 'on' ? '' : 'hide-sub-title');
		$showSportIconStyle = ( $showSportIcon == 'on' ? '' : 'hide-sport-icon');
		$showFavoriteIconStyle = ( $showFavoriteIcon == 'on' ? '' : 'hide-favorite-icon');


		$sport_img_src = 'https://devdeeds.wpengine.com/wp-content/uploads/2019/04/kayaking-blue.svg';
		$favor_img_src = 'https://devdeeds.wpengine.com/wp-content/uploads/2019/03/favorite-icon-empty.svg';
		
		// load javascript
		wp_enqueue_style( 'tile-style', plugins_url('/UniversalTileModule/styles/deeds-tile.css') );
		wp_register_script( 'deeds-tile-register', plugins_url('/UniversalTileModule/deeds-tile.js'));
		wp_enqueue_script( 'deeds-tile-divi-module', plugins_url('/UniversalTileModule/deeds-tile.js'), array('deeds-tile-register'));
		wp_localize_script( 'deeds-tile-divi-module', 'deedsTileSettings', 
			array('cloudImgGrayPrefix' 	=> $this->cloud_img_gray_prefix(),
						'cloudImgPrefix'			=> $this->cloud_img_prefix(),
						'cloudimg_operation'	=> $cloudimg_operation,
						'cloudimg_width'			=> $cloudimg_width,
						'couldimg_height'			=> $couldimg_height,
						'cloudimg_filter'			=> $cloudimg_filter,
						'cloudimg_token'			=> $cloudimg_token));

		wp_print_scripts( 'deeds-tile-divi-module');

		$html = $this->get_tile_html(
			$module_class,
			$entireInfoPos,
			$sizeType,
			$showSportIconStyle,
			$extraInfoPos,
			$showFavoriteIconStyle, 
			$showMainTitleStyle,
			$favor_img_src,
			$mainTitle,
			$link,
			$sport_img_src,
			$extraInfo,
			$profile_img_src
		);
		
		$javascript = $this->get_tile_js(
			$module_class,
			$entireInfoPos, 
			$sizeType, 
			$showSportIconStyle, 
			$extraInfoPos, 
			$showFavoriteIconStyle, 
			$showMainTitleStyle,
			$favor_img_src,
			$useSpecialMainTitle, 
			$mainTitle,
			$specialMainTitle,
			$useSpecialSubTitle,
			$subTitle,
			$specialSubTitle,
			$link, 
			$sport_img_src,
			$useSpecialextraInfo,
			$extraInfo,
			$specialextraInfo,
			$useSpecProfileImg,
			$profile_img_src,
			$specProfileImg,
			$emptyImage, 
			$pinstantSearch,
			$pcontainer_id,
			$puseCloudImage,
			$prespJSCloudRatio,
			$preloadAnimationType,
			$useInstagram
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
		$module_class = $this->module_classname( $render_slug );

		// Render module content
		if ($useAlgolia === 'off'){
			
			return sprintf(
				'<div class="dicm-content">%1$s</div>',
				$this->get_html_with_js($module_class)
			);	
		} else {
			return sprintf(
				'%1$s',
				$this->get_html_with_js($module_class)
			);
		}
		
	}
}

new DICM_Child;
