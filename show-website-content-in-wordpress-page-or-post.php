<?php
/*
Plugin Name: Show Website Content in WordPress Page or Post
Plugin URI:
Description: Fetches the content of another webpage or URL to display inside the current post or page.
Author: Hors Hipsrectors
Author URI:
Tags: adopt-me
Version: 2017.08.13
*/

/**
 * Show Website Content in WordPress Page or Post
 *
 * This file contains all the logic required for the plugin
 *
 * @link		http://wordpress.org/extend/plugins/show-website-content-in-wordpress-page-or-post/
 *
 * @package		Show Website Content in WordPress Page or Post
 * @copyright		Copyright ( c ) 2017, Hors Hipsrectors
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 ( or newer )
 *
 * @since		Show Website Content in WordPress Page or Post 1.0
 */

/**
 * Fetches the HTML of a target URL using file_get_contents or CURL
 * @param object $settings the url to fetch
 * @return object  returns the HTML for an object
 */
function horshipsrectors_get_html( $settings ) {

	$html = horshipsrectors_get_html_get( $settings );

	if ( empty( $html ) )
		$html = horshipsrectors_get_html_curl( $settings );

	return $html;

}
add_shortcode( 'horshipsrectors_get_html' , 'horshipsrectors_get_html' );


/**
 * Fetches the HTML of a target URL using file_get_contents
 * @param object $settings the url to fetch
 * @return object  returns the HTML for an object
 */
function horshipsrectors_get_html_get( $settings ) {

	if ( function_exists( 'file_get_contents' ) ) {
		extract( shortcode_atts( array( 'plugins' => '0' ), $settings ) );
		return @file_get_contents( $settings[0] );
	}

}
add_shortcode( 'horshipsrectors_get_html_get' , 'horshipsrectors_get_html' );

/**
 * Fetches the HTML of a target URL using CURL
 * @param object $settings the url to fetch
 * @return object  returns the HTML for an object
 */
function horshipsrectors_get_html_curl( $settings ) {

	if( is_callable( 'curl_init' ) ) {
		extract( shortcode_atts( array( 'plugins' => '0' ), $settings ) );
		$url = $settings[0];

		$referer = get_bloginfo( 'url' );
		$timeout = 30;

		$curl = curl_init( );

		if( strstr( $referer,"://" ) )
			curl_setopt ( $curl, CURLOPT_REFERER, $referer );

		curl_setopt ( $curl, CURLOPT_URL, $url );
		curl_setopt ( $curl, CURLOPT_TIMEOUT, $timeout );
		curl_setopt ( $curl, CURLOPT_USERAGENT, sprintf( "Mozilla/%d.0",rand( 4,5 ) ) );
		curl_setopt ( $curl, CURLOPT_HEADER, ( int )$header );
		curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, 0 );
		$html = curl_exec ( $curl );
		curl_close ( $curl );

		return $html;
	}
}
add_shortcode( 'horshipsrectors_get_html_curl', 'horshipsrectors_get_html_curl' );
