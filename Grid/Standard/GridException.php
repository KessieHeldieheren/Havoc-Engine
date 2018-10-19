<?php
declare(strict_types=1);

namespace Havoc\Engine\Grid\Standard;

use Havoc\Engine\Exceptions\HavocEngineException;

/**
 * Havoc Core grid exceptions.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class GridException extends HavocEngineException
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
