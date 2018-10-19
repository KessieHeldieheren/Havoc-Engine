<?php
declare(strict_types=1);

namespace Havoc\Engine\Config;

/**
 * Havoc Core default configuration settings.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
abstract class DefaultConfig
{
    public const WORLD_DEFAULT_X = 32;
    public const WORLD_DEFAULT_Y = 16;
    public const WORLD_COORDINATES_GUIDE_VISIBLE = true;
    public const WORLD_POINT_NORMAL_ICON = "∙";
    public const WORLD_POINT_ALTERNATE_ICON = "-";
    
    public const COORDINATES_FORMAT = '%s:%s';
    
    public const RENDER_HORIZONTAL_BAR_CHARACTER = "-";
    public const RENDER_VERTICAL_BAR_CHARACTER = "|";
}
