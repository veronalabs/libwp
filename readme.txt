=== Snail ===
Contributors: mostafa.s1990, kashani, veronalabs
Donate link: https://wp-sms-pro.com/donate
Tags: theme, functionality, post-type, taxonomy, library
Requires at least: 3.0
Tested up to: 5.6
Requires PHP: 7.1
Stable tag: 1.0
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Provide some simple functionality to register some hooks that could not register inside the WordPress themes

== Description ==
Provide some simple functionality to register some hooks that could not register inside the WordPress themes

## Quick Start

Get instance of main class.

    Snail();

## Factories

**Post type**

    Snail()->postType();

**Taxonomy**

    Snail()->taxonomy();

## Examples

### Register a new taxonomy

    Snail()->postType()
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


### Register a new taxonomy belongs to previous post type

    Snail()->taxonomy()
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


== Installation ==
1. Upload `snail` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Changelog ==
= 1.0 =
* Initial the plugin
