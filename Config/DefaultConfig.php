<?php
declare(strict_types=1);

namespace Havoc\Engine\Config;

/**
 * Havoc Engine default configuration settings.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class DefaultConfig
{
    public const WORLD_DEFAULT_X_BOUNDARY = 24;
    public const WORLD_DEFAULT_Y_BOUNDARY = 24;
    public const WORLD_DEFAULT_X_VIEW = 24;
    public const WORLD_DEFAULT_Y_VIEW = 24;
    public const WORLD_COORDINATES_GUIDE_VISIBLE = true;
    public const WORLD_POINT_NORMAL_ICON = "∙";
    public const WORLD_POINT_ALTERNATE_ICON = "-";
    public const WORLD_POINT_OUT_OF_BOUNDS_ICON = "+";
    
    public const RENDER_HORIZONTAL_BAR_CHARACTER = "–";
    public const RENDER_VERTICAL_BAR_CHARACTER = "|";
}
