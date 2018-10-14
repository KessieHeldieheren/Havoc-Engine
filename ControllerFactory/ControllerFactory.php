<?php
declare(strict_types=1);

namespace Havoc\Engine\ControllerFactory;

use Havoc\Engine\Config\ConfigController;
use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Entity\EntityController;
use Havoc\Engine\Entity\EntityControllerInterface;
use Havoc\Engine\Grid\GridInterface;
use Havoc\Engine\Logger\LogControllerInterface;
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
            throw ControllerFactoryException::configControllerBadClass($controller);
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
            throw ControllerFactoryException::worldControllerBadClass($controller);
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
            throw ControllerFactoryException::tickControllerBadClass($controller);
        }
        
        return new $controller();
    }
    
    /**
     * Create a new tick controller.
     *
     * @param ConfigControllerInterface $config_controller
     * @param GridInterface $grid
     * @param LogControllerInterface $logger
     * @param string $controller
     * @return EntityControllerInterface
     * @throws \ReflectionException
     */
    public static function newEntityController(ConfigControllerInterface $config_controller, GridInterface $grid, LogControllerInterface $logger, string $controller = EntityController::class): EntityControllerInterface
    {
        $reflects = (new ReflectionClass($controller))->implementsInterface(EntityControllerInterface::class);
        
        if (false === $reflects) {
            throw ControllerFactoryException::entityControllerBadClass($controller);
        }
        
        return new $controller($config_controller, $grid, $logger);
    }
    
    /**
     * Create a new log controller.
     *
     * @param string $controller
     * @return LogControllerInterface
     */
    public static function newLogController(string $controller): LogControllerInterface
    {
        $reflects = (new ReflectionClass($controller))->implementsInterface(LogControllerInterface::class);
    
        if (false === $reflects) {
            throw ControllerFactoryException::logControllerBadClass($controller);
        }
    
        return new $controller();
    }
}
