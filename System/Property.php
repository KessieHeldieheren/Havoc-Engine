<?php
declare(strict_types=1);

namespace Havoc\Engine\System;

/**
 * Havoc Engine engine properties.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class Property
{
    public const X_GRID_MIN = PHP_INT_MIN;
    public const X_GRID_MAX = PHP_INT_MAX;
    
    public const Y_GRID_MIN = PHP_INT_MIN;
    public const Y_GRID_MAX = PHP_INT_MAX;
}
