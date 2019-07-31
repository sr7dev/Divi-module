<?php
/**
 * Child module / module item (module which appears inside parent module) with FULL builder support
 * This module appears on Visual Builder and requires react component to be provided
 * Due to full builder support, all advanced options (except button options) are added by default
 *
 * @since 1.0.0
 */
class DICM_CTA_Child extends ET_Builder_Module {
	// Module slug (also used as shortcode tag)
	public $slug                     = 'dicm_cta_child';

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
		$this->name             = esc_html__( 'Custom CTA Child', 'dicm-divi-custom-modules' );

		// Default label for module item. Basically if $this->child_title_var and $this->child_title_fallback_var
		// attributes are empty, this default text will be used instead as item label
		$this->advanced_setting_title_text = esc_html__( 'CTA Item', 'et_builder' );

		// Module item's modal title
		$this->settings_text = esc_html__( 'CTA Item Settings', 'et_builder' );

		// Toggle settings
		$this->settings_modal_toggles  = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Text', 'dicm-divi-custom-modules' ),
					'button'       => esc_html__( 'Button', 'dicm-divi-custom-modules' ),
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
			'title' => array(
				'label'           => esc_html__( 'Title', 'dicm-divi-custom-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Text entered here will appear as title.', 'dicm-divi-custom-modules' ),
				'toggle_slug'     => 'main_content',
			),
			'subtitle' => array(
				'label'           => esc_html__( 'Sub Title', 'dicm-divi-custom-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Text entered here will appear as subtitle.', 'dicm-divi-custom-modules' ),
				'toggle_slug'     => 'main_content',
			),
			'content' => array(
				'label'           => esc_html__( 'Content', 'dicm-divi-custom-modules' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'dicm-divi-custom-modules' ),
				'toggle_slug'     => 'main_content',
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

	function get_html_with_js() {
		$title = $this->props['title'];
		$subtitle = $this->props['subtitle'];
		$description_test = $this->props['content'];
		$profile_img_src = 'https://amdgjadcen.cloudimg.io/width/200/q35.foil1/https://www.deedsalone.com/wp-content/uploads/2018/12/Doug-post.png';
		$sport_img_src = 'https://devdeeds.wpengine.com/wp-content/uploads/2019/04/kayaking-blue.svg';
		$favor_img_src = 'https://devdeeds.wpengine.com/wp-content/uploads/2019/03/favorite-icon-empty.svg';
		$style_tiles = 'deeds-tiles';
		$style_tiles_pos = 'grid';
		$style_tile = 'deeds-tile';
		$style_tile_type = 'bottom-info';
		$style_tile_size = 'fixed-height';
		$style_desc_info = 'tile-desc-info';
		$style_profile_img = 'deeds-tile-row-profile-img';


		wp_enqueue_style( 'medrec-instantsearch', plugins_url('/divi-extension-example-master/styles/deeds-tile.css') );
		wp_register_script( 'test-child-register', plugins_url('/divi-extension-example-master/test-child.js'));
		wp_enqueue_script( 'test-child-divi-module', plugins_url('/divi-extension-example-master/test-child.js'), array('test-child-register'));
		wp_localize_script( 'test-child-divi-module', 'testChildSettings', array('test-string' => $description_test,));
		wp_print_scripts( 'test-child-divi-module');

		$html = 
		'<div class="' . $style_tiles . ' ' . $style_tiles_pos . '">
			<div class="' . $style_tile . ' ' . $style_tile_type. ' ' . $style_tile_size . '">
	        <div class="deeds-tile-desc">
	            <div class="deeds-tile-row">
	                <div class="deeds-tile-fav">
	                    <button class="simplefavorite-button id_-1_26792-0">
	                        <img class="favor_img unfavor" src="' .$favor_img_src . '" />
	                    </button>
	                </div>
	                <div class="deeds-tile-maintitle">
	                    <a href="#">
	                        <span>' . $title . '</span>
	                    </a>
	                </div>
	                <div class="tile-sport">
	                    <a href="#">
	                        <img src="' . $sport_img_src . '" alt="Kayaking">
	                    </a>
	                </div>
	            </div>
	            <div class="deeds-tile-row">
	                <div class="' . $style_desc_info . '">
	                    <a href="#">
	                        <span>' . $subtitle . '</span>
	                    </a>
	                </div>
	            </div>
	        </div>
	        <div class="' . $style_profile_img . '">
	            <a href="#" class="deeds-tile-row">
	                <img id="Doguetebmx" src="' . $profile_img_src . '">
	            </a>
	        </div>
	    </div>
	    </div>';
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
		$title                 = $this->props['title'];
		$subtitle              = $this->props['subtitle'];
	
		// Render module content
		return sprintf(
			'<div class="dicm-content">%1$s</div>',
			$this->get_html_with_js()
		);
	}
}

new DICM_CTA_Child;
