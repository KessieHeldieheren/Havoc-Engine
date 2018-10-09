<?php
declare(strict_types=1);

namespace Havoc\Engine\Factories;

use Havoc\Engine\Config\ConfigController;
use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Tick\TickController;
use Havoc\Engine\Tick\TickControllerInterface;
use Havoc\Engine\World\WorldController;
use Havoc\Engine\World\WorldControllerInterface;
use ReflectionClass;

/**
 * Havoc Engine controller factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
abstract class ControllerFactory
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
            throw FactoryException::configControllerBadClass($controller);
        }
        
        return new $controller();
    }
    
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
            throw FactoryException::worldControllerBadClass($controller);
        }
        
        return new $controller($config_controller);
    }
    
    /**
     * Create a new tick controller.
     *
     * @param string $controller
     * @return TickControllerInterface
     * @throws \ReflectionException
     */
    public static function newTickController(string $controller = TickController::class): TickControllerInterface
    {
        $reflects = (new ReflectionClass($controller))->implementsInterface(TickControllerInterface::class);
        
        if (false === $reflects) {
            throw FactoryException::tickControllerBadClass($controller);
        }
        
        return new $controller();
    }
}
