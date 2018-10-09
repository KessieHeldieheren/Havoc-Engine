<?php
declare(strict_types=1);

namespace Havoc\Engine\Exceptions;

/**
 * Havoc Engine exception code list.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
abstract class ExceptionCode
{
    # WorldException
    public const WORLD_POINT_NOT_IMPLEMENTING = 0x1000;
    
    # ConfigException
    public const CONFIG_X_GRID_OVER_MAX = 0x2000;
    public const CONFIG_X_GRID_UNDER_MIN = 0x2001;
    public const CONFIG_Y_GRID_OVER_MAX = 0x2002;
    public const CONFIG_Y_GRID_UNDER_MIN = 0x2003;
    
    # FactoryException
    public const CONFIG_CONTROLLER_BAD_CLASS = 0x3000;
    public const WORLD_CONTROLLER_BAD_CLASS = 0x3001;
    public const ENTITY_CONTROLLER_BAD_CLASS = 0x3002;
    public const TICK_CONTROLLER_BAD_CLASS = 0x3003;
    public const COORDINATES_BAD_CLASS = 0x3004;
    public const RENDER_BAD_CLASS = 0x3005;
    public const GRID_BAD_CLASS = 0x3006;
}
