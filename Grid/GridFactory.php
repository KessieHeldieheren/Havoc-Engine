<?php
declare(strict_types=1);

namespace Havoc\Engine\Grid;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\ControllerFactory\ControllerFactoryException;
use ReflectionClass;

/**
 * Havoc Engine grid factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
abstract class GridFactory
{
    public static function new(ConfigControllerInterface $config_controller, string $grid = Grid::class): GridInterface
    {
        $reflects = (new ReflectionClass($grid))->implementsInterface(GridInterface::class);
    
        if (false === $reflects) {
            throw ControllerFactoryException::gridBadClass($grid);
        }
    
        return new $grid($config_controller);
    }
}
