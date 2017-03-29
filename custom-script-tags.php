<?php
/*
Plugin Name: Custom Script Tags
Description: Add ACF areas for custom scripts in the header or footer.
Version:     1.0.2
Author:      Tomas Mulder
Author URI:  http://www.tcmulder.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: apply-acf-layout
Domain Path: /languages
*/

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Initialize the plugin
 */
Custom_Script_Tags_Plugin::init();

/**
 * Define the functionality
 */
Class Custom_Script_Tags_Plugin {

    private static $initiated = false;

    /**
     * Kick off first things
     */
    public static function init() {
        if ( ! self::$initiated ) {
            self::init_hooks();
            add_action( 'acf/init', array( 'Custom_Script_Tags_Plugin', 'create_options_page' ) );
            add_action( 'wp_head', array( 'Custom_Script_Tags_Plugin', 'add_script_before_closing_head' ), 10 );
            add_action( 'custom_script_tags_plugin_before_closing_body', array( 'Custom_Script_Tags_Plugin', 'add_script_after_opening_body' ) );
            add_action( 'wp_footer', array( 'Custom_Script_Tags_Plugin', 'add_script_before_closing_body' ), 50 );
        }
    }

    /**
     * Attach methods to hooks
     */
    public static function init_hooks() {
        self::$initiated = true;

    }

    /**
     * Create the options page
     */
    public static function create_options_page(){
        if( function_exists('acf_add_options_page') ) {
            acf_add_options_sub_page(array(
                'page_title'    => 'Custom Scripts',
                'parent_slug'   => 'options-general.php',
                'menu_title'    => 'Custom Scripts',
                'menu_slug'     => 'custom-scripts',
                'capability'    => 'edit_posts',
                'redirect'      => false,
            ));
        }
        if( function_exists('acf_add_local_field_group') ){
            acf_add_local_field_group(array (
                'key' => 'group_56eaaf410d8a4',
                'title' => 'Custom Scripts',
                'fields' => array (
                    array (
                        'key' => 'field_56eaaf69ba041',
                        'label' => 'Description',
                        'name' => '',
                        'type' => 'message',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'message' => '<span style="color:red">For advanced users only.</span> These fields allow you to add custom code to common spots on your website. If handled improperly, changing these settings could break your site: edit with caution.',
                        'new_lines' => 'wpautop',
                        'esc_html' => 0,
                    ),
                    array (
                        'key' => 'field_56eab060cc22d',
                        'label' => 'Before Closing < / head >',
                        'name' => 'before_closing_head',
                        'type' => 'textarea',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '<!-- your code would go here --> </head>',
                        'maxlength' => '',
                        'rows' => '',
                        'new_lines' => '',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                    array (
                        'key' => 'field_56eab09ccc22e',
                        'label' => 'After Opening < body >',
                        'name' => 'after_opening_body',
                        'type' => 'textarea',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '<body> <!-- your code would go here -->',
                        'maxlength' => '',
                        'rows' => '',
                        'new_lines' => '',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                    array (
                        'key' => 'field_56eab0b6cc22f',
                        'label' => 'Before Closing < / body >',
                        'name' => 'before_closing_body',
                        'type' => 'textarea',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '<!-- your code would go here --> </body>',
                        'maxlength' => '',
                        'rows' => '',
                        'new_lines' => '',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                ),
                'location' => array (
                    array (
                        array (
                            'param' => 'options_page',
                            'operator' => '==',
                            'value' => 'custom-scripts',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => 1,
                'description' => '',
            ));
        }
    }

    /**
     * Add scripts to the head foot and body
     */
    public static function add_script_before_closing_head(){
        the_field('before_closing_head', 'option');
    }
    public static function add_script_after_opening_body(){
        the_field('after_opening_body', 'option');
    }
    public static function add_script_before_closing_body(){
        the_field('before_closing_body', 'option');
    }

}
