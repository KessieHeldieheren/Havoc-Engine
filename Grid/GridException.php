<?php
declare(strict_types=1);

namespace Havoc\Engine\Grid;

use Havoc\Engine\Exceptions\EngineException;
use Havoc\Engine\Grid\GridSupervisor\GridSupervisorInterface;

/**
 * Havoc Engine grid exceptions.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class GridException extends EngineException
{
    public const GRID_BAD_CLASS = 0x1;
    
    /**
     * @param string $given_class
     * @return GridException
     */
    public static function gridBadClass(string $given_class): self
    {
        $required_class = GridSupervisorInterface::class;
        
        return new self (
            sprintf("Cannot create a grid using %s, as it must implement %s.", $given_class, $required_class),
            self::GRID_BAD_CLASS
        );
    }
}
