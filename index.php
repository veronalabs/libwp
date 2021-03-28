<?php
/**
 * Plugin Name: LibWp
 * Plugin URI: https://github.com/vitathemes/libwp
 * Description: Provide some simple functionality to register some hooks that could not register inside the WordPress themes
 * Version: 2.2
 * Author: VeronaLabs
 * Author URI: https://veronalabs.com/
 * Text Domain: libwp
 * Domain Path: /resources/languages
 */

use LibWp\LibWpFactory;

require __DIR__ . '/libwp.php';

/**
 * Returns the main instance of LibWp.
 *
 * @return LibWpFactory
 */
function LibWp()
{
    return LibWpFactory::instance();
}

/**
 * Register an example post type & taxonomy
 */
add_action('after_setup_theme', function (){
    LibWp()->postType()
    ->setId(1)
    ->setName('book')
    ->setLabels([
        'name'          => _x('Books', 'Post type general name', 'textdomain'),
        'singular_name' => _x('Book', 'Post type singular name', 'textdomain'),
        'menu_name'     => _x('Books', 'Admin Menu text', 'textdomain'),
        'add_new'       => __('Add New', 'textdomain'),
        'edit_item'     => __('Edit Book', 'textdomain'),
        'view_item'     => __('View Book', 'textdomain'),
        'all_items'     => __('All Books', 'textdomain'),
    ])
    ->setFeatures([
        'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'
    ])
    ->setArgument('show_ui', true)
    ->register();

LibWp()->taxonomy()
    ->setId(1)
    ->setName('types')
    ->setPostTypes('book')
    ->setLabels([
        'name'          => _x('Types', 'taxonomy general name', 'textdomain'),
        'singular_name' => _x('Type', 'taxonomy singular name', 'textdomain'),
        'search_items'  => __('Search Types', 'textdomain'),
        'all_items'     => __('All Types', 'textdomain'),
        'edit_item'     => __('Edit Type', 'textdomain'),
        'add_new_item'  => __('Add New Type', 'textdomain'),
        'new_item_name' => __('New Type Name', 'textdomain'),
        'menu_name'     => __('Types', 'textdomain'),
    ])
    ->register();
});