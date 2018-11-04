<?php
declare(strict_types=1);

namespace Havoc\Engine\Grid;

use Havoc\Engine\Core\EngineException;
use Havoc\Engine\Grid\GridSupervisor\GridSupervisorInterface;
use Havoc\Engine\Grid\GridView\GridView;

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
    public const X_VIEW_OVER_MAX = 0x2;
    public const Y_VIEW_OVER_MAX = 0x3;
    
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
    
    /**
     * @param int $value
     * @return GridException
     */
    public static function xViewOverMax(int $value): self
    {
        $max = GridView::X_VIEW_MAX;
        
        return new self (
            sprintf("Cannot set the X view to %s, as the maximum is %s.", $value, $max),
            self::X_VIEW_OVER_MAX
        );
    }
    
    /**
     * @param int $value
     * @return GridException
     */
    public static function yViewOverMax(int $value): self
    {
        $max = GridView::Y_VIEW_MAX;
        
        return new self (
            sprintf("Cannot set the Y view to %s, as the maximum is %s.", $value, $max),
            self::Y_VIEW_OVER_MAX
        );
    }
}
