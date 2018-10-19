<?php
declare(strict_types=1);

namespace Havoc\Engine\Grid\Standard;

use Havoc\Engine\Config\ConfigControllerInterface;
use ReflectionClass;

/**
 * Havoc Core grid supervisor factory.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
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
