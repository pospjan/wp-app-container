<?php // phpcs:disable PSR1.Files.SideEffects

/*
 * Plugin Name: Modularity Plugin Two
 * Description: A test plugin for Modularity used by WP App Container and other way around.
 * Version: 1.0.0
 * Requires PHP: 7.2
 */

declare(strict_types=1);

namespace Inpsyde\App\Tests\Project\ModularityPlugin;

use Inpsyde\Modularity\Properties\PluginProperties;
use Inpsyde\Modularity\Package;

const VERSION = '1.0.0';

/**
 * @return PluginProperties
 */
function properties(): PluginProperties
{
    static $properties;
    $properties or $properties = PluginProperties::new(__FILE__);

    return $properties;
}

/**
 * @return Package
 */
function plugin(): Package
{
    static $plugin;
    $plugin or $plugin = Package::new(properties());

    return $plugin;
}

add_action(
    'plugins_loaded',
    static function (): void {
        plugin()->addModule(new CollectorModule())->boot();
    }
);
