<?php
/**
 * Plugin Name: LibWp
 * Plugin URI: https://github.com/vitathemes/libwp
 * Description: Provide some simple functionality to register some hooks that could not register inside the WordPress themes
 * Version: 2.0
 * Author: VeronaLabs
 * Author URI: https://veronalabs.com/
 * Text Domain: deer
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