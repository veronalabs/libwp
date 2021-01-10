<?php
/**
 * Plugin Name: Snail
 * Plugin URI: https://github.com/vitathemes/snail
 * Description: Provide some simple functionality to register some hooks that could not register inside the WordPress themes
 * Version: 1.0
 * Author: VeronaLabs
 * Author URI: https://veronalabs.com/
 * Text Domain: deer
 * Domain Path: /resources/languages
 */

use Snail\SnailFactory;

require __DIR__ . '/snail.php';

/**
 * Returns the main instance of Snail.
 *
 * @return SnailFactory
 */
function Snail()
{
    return SnailFactory::instance();
}