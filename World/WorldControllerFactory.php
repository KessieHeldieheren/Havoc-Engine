<?php
declare(strict_types=1);

namespace Havoc\Engine\World;

use Havoc\Engine\Config\ConfigControllerInterface;
use ReflectionClass;

/**
 * Havoc Core world controller factory.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
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
        
        if (false === $reflects) {
            throw WorldException::worldControllerBadClass($controller);
        }
        
        return new $controller($config_controller);
    }
}
