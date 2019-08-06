<?php
/*
Plugin Name: Deeds Universal Tile Module
Plugin URI:  https://elegantthemes.com
Description: Custom module examples for Divi built using create-divi-extension
Version:     1.0.0
Author:      Elegant Themes
Author URI:  https://elegantthemes.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: dicm_divi_custom_modules
Domain Path: /languages

Deeds Universal Tile Module is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Deeds Universal Tile Module is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Deeds Universal Tile Module. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


if ( ! function_exists( 'dicm_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function dicm_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/DiviCustomModules.php';
}
add_action( 'divi_extensions_init', 'dicm_initialize_extension' );
endif;
