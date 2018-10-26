<?php
declare(strict_types=1);

namespace Havoc\Engine\World;

use Havoc\Engine\Config\ConfigControllerInterface;
use ReflectionClass;

/**
 * Havoc Engine world controller factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class WorldControllerFactory
{
    /**
     * Create a new world controller.
     *
     * @param ConfigControllerInterface $config_controller
     * @param string $controller
     * @return WorldController
     * @throws \ReflectionException
     */
    public static function newWorldController(ConfigControllerInterface $config_controller, string $controller = WorldController::class): WorldController
    {
        $reflects = (new ReflectionClass($controller))->implementsInterface(WorldControllerInterface::class);
        
        if ($reflects === false) {
            throw WorldException::worldControllerBadClass($controller);
        }
        
        return new $controller($config_controller);
    }
}
