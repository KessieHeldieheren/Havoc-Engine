<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\EntityController;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Entity\EntityController\EntityController;
use Havoc\Engine\Entity\EntityController\EntityControllerInterface;
use Havoc\Engine\Entity\EntityException;
use Havoc\Engine\Grid\Standard\GridSupervisorInterface;
use Havoc\Engine\Logger\LogController\LogControllerInterface;
use ReflectionClass;

/**
 * Havoc Engine entity controller factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class EntityControllerFactory
{
    /**
     * Create a new tick controller.
     *
     * @param ConfigControllerInterface $config_controller
     * @param GridSupervisorInterface $grid
     * @param \Havoc\Engine\Logger\LogController\LogControllerInterface $logger
     * @param string $controller
     * @return EntityControllerInterface
     * @throws \ReflectionException
     */
    public static function newEntityController(ConfigControllerInterface $config_controller, GridSupervisorInterface $grid, LogControllerInterface $logger, string $controller = EntityController::class): EntityControllerInterface
    {
        $reflects = (new ReflectionClass($controller))->implementsInterface(EntityControllerInterface::class);
        
        if (false === $reflects) {
            throw EntityException::entityControllerBadClass($controller);
        }
        
        return new $controller($config_controller, $grid, $logger);
    }
}
