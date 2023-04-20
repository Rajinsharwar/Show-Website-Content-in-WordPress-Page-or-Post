<?php
/*
Plugin Name: Show Website Content in WordPress Page or Post
Plugin URI: 
Description: Fetches the content of another webpage or URL to display inside the current post or page.
Author: Hors Hipsrectors, Rajin Sharwar
Author URI: https://linkedin.com/u/rajinsharwar
Tags: shortcode
Version: 2.0.0
*/

namespace Show_Web_Con;

defined( 'ABSPATH' ) || exit;

/**
 * Fetches the HTML of a target URL using file_get_contents
 * @param array $atts Shortcode attributes
 * @return string  returns the HTML content for the specified URL
 */
function show_web_con_get_html_get( $atts ) {
    $atts = shortcode_atts( array(
        'url' => '',
    ), $atts );

    $url = esc_url_raw( $atts['url'] );

    if ( empty( $url ) ) {
        return '';
    }

    if ( ! function_exists( 'file_get_contents' ) ) {
        return '';
    }

    $html = @file_get_contents( $url );

    return $html;
}
add_shortcode( 'show_web_con_get_html_get', __NAMESPACE__ . '\show_web_con_get_html_get' );

/**
 * Fetches the HTML of a target URL using CURL
 * @param array $atts Shortcode attributes
 * @return string  returns the HTML content for the specified URL
 */
function show_web_con_get_html_curl( $atts ) {
    $atts = shortcode_atts( array(
        'url' => '',
    ), $atts );

    $url = esc_url_raw( $atts['url'] );

    if ( empty( $url ) ) {
        return '';
    }

    if ( ! is_callable( 'curl_init' ) ) {
        return '';
    }

    $referer = get_bloginfo( 'url' );
    $timeout = 30;

    $curl = curl_init();

    if ( strstr( $referer, "://" ) ) {
        curl_setopt( $curl, CURLOPT_REFERER, $referer );
    }

    curl_setopt( $curl, CURLOPT_URL, $url );
    curl_setopt( $curl, CURLOPT_TIMEOUT, $timeout );
    curl_setopt( $curl, CURLOPT_USERAGENT, sprintf( "Mozilla/%d.0", rand( 4, 5 ) ) );
    curl_setopt( $curl, CURLOPT_HEADER, 0 );
    curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 0 );
    $html = curl_exec( $curl );
    curl_close( $curl );

    return $html;
}
add_shortcode( 'show_web_con_get_html_curl', __NAMESPACE__ . '\show_web_con_get_html_curl' );

/**
 * Fetches the HTML of a target URL using the WordPress HTTP API
 * @param array $atts Shortcode attributes
 * @return string  returns the HTML content for the specified URL
 */
function show_web_con_get_html_wp_remote( $atts ) {
    $atts = shortcode_atts( array(
        'url' => '',
    ), $atts );

    $url = esc_url_raw( $atts['url'] );

    if ( empty( $url ) ) {
        return '';
    }

    $response = wp_remote_get( $url );

    if ( is_wp_error( $response ) || wp_remote_retrieve_response_code( $response ) !== 200 ) {
        return '';
    }

    $html = wp_remote_retrieve_body( $response );

    return $html;
}
add_shortcode( 'show_web_con_get_html_wp_remote', __NAMESPACE__ . '\show_web_con_get_html_wp_remote' );