<?php
/**
 * Plugin Name: Custom Page Template
 * Plugin URI: https://example.com/custom-page-template
 * Description: Creates a new page with a custom template
 * Version: 1.0
 * Author: Akmal Hafiz Hashim
 * Author URI: https://example.com
 * License: GPL2
 *
 * This plugin creates a new page with a custom template, 
 * and can create the template file programmatically
 * if it doesn't exist.
 *
 * Usage:
 * - Activate the plugin
 * - The custom template and the new page will be created automatically
 *
 * Note:
 * - The template file name should be 'custom-template.php'
 * - The template file will be created in the current theme's directory
 */

add_action( 'init', 'create_custom_page' );

function create_custom_page() {

    $template_file = get_template_directory() . '/custom-template.php';
    if( !file_exists( $template_file ) ) {
        $template_content = '<?php /* Template Name: Custom Template */ ?>';
        file_put_contents( $template_file, $template_content );
    }
    $new_page = array(
        'post_title' => 'Hello Guys',
        'post_content' => 'My name is Akmal Hafiz and Im 24 years old.',
        'post_status' => 'publish',
        'post_type' => 'page',
        'page_template' => 'custom-template.php'
    );

    wp_insert_post( $new_page );
}