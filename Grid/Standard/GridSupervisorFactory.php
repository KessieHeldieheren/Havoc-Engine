<?php
declare(strict_types=1);

namespace Havoc\Engine\Grid\Standard;

use Havoc\Engine\Config\ConfigControllerInterface;
use ReflectionClass;

/**
 * Havoc Engine grid supervisor factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class GridSupervisorFactory
{
    /**
     * Create a new grid.
     *
     * @param ConfigControllerInterface $config_controller
     * @param string $supervisor
     * @return GridSupervisorInterface
     * @throws \ReflectionException
     */
    public static function new(ConfigControllerInterface $config_controller, string $supervisor = GridSupervisor::class): GridSupervisorInterface
    {
        $reflects = (new ReflectionClass($supervisor))->implementsInterface(GridSupervisorInterface::class);
    
        if (false === $reflects) {
            throw GridException::gridBadClass($supervisor);
        }
    
        return new $supervisor($config_controller);
    }
}
