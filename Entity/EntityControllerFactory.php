<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Grid\GridInterface;
use Havoc\Engine\Logger\LogControllerInterface;
use ReflectionClass;

/**
 * Havoc Engine entity controller factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
abstract class EntityControllerFactory
{
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
            throw EntityException::entityControllerBadClass($controller);
        }
        
        return new $controller($config_controller, $grid, $logger);
    }
}
