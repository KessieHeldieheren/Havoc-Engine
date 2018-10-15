<?php
declare(strict_types=1);

namespace Havoc\Engine\Config;

use ReflectionClass;

/**
 * Havoc Engine configuration controller factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
abstract class ConfigControllerFactory
{
    /**
     * Create a new configuration controller.
     *
     * @param string $controller
     * @return ConfigController
     */
    public static function newConfigController(string $controller = ConfigController::class): ConfigController
    {
        $reflects = (new ReflectionClass($controller))->implementsInterface(ConfigControllerInterface::class);
        
        if (false === $reflects) {
            throw ConfigException::configControllerBadClass($controller);
        }
        
        return new $controller();
    }
}
