<?php
declare(strict_types=1);

namespace Havoc\Engine\Config;

use Havoc\Engine\Exceptions\HavocEngineException;
use Havoc\Engine\System\Property;

/**
 * Havoc Engine configuration exceptions.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class ConfigException extends HavocEngineException
{
    public const CONFIG_CONTROLLER_BAD_CLASS = 0x1;
    public const CONFIG_X_GRID_OVER_MAX = 0x2;
    public const CONFIG_X_GRID_UNDER_MIN = 0x3;
    public const CONFIG_Y_GRID_OVER_MAX = 0x4;
    public const CONFIG_Y_GRID_UNDER_MIN = 0x5;
    
    /**
     * @param string $given_class
     * @return ConfigException
     */
    public static function configControllerBadClass(string $given_class): self
    {
        $required_class = ConfigControllerInterface::class;
        
        return new self (
            sprintf("Cannot instantiate the config controller module using %s, as it must implement %s.", $given_class, $required_class),
            self::CONFIG_CONTROLLER_BAD_CLASS
        );
    }
    
    /**
     * @param int $value
     * @return ConfigException
     */
    public static function xGridOverMax(int $value): self
    {
        $max = Property::X_GRID_MAX;
        
        return new self (
            sprintf("Attempted to set the X axis length of the world grid to %s, which is over the maximum of %s.", $value, $max),
            self::CONFIG_X_GRID_OVER_MAX
        );
    }
    
    /**
     * @param int $value
     * @return ConfigException
     */
    public static function xGridUnderMin(int $value): self
    {
        $min = Property::X_GRID_MIN;
        
        return new self (
            sprintf("Attempted to set the X axis length of the world grid to %s, which is under the minimum of %s.", $value, $min),
            self::CONFIG_X_GRID_UNDER_MIN
        );
    }
    
    /**
     * @param int $value
     * @return ConfigException
     */
    public static function yGridOverMax(int $value): self
    {
        $max = Property::Y_GRID_MAX;
        
        return new self (
            sprintf("Attempted to set the Y axis length of the world grid to %s, which is over the maximum of %s.", $value, $max),
            self::CONFIG_Y_GRID_OVER_MAX
        );
    }
    
    /**
     * @param int $value
     * @return ConfigException
     */
    public static function yGridUnderMin(int $value): self
    {
        $min = Property::Y_GRID_MIN;
        
        return new self (
            sprintf("Attempted to set the Y axis length of the world grid to %s, which is under the minimum of %s.", $value, $min),
            self::CONFIG_Y_GRID_UNDER_MIN
        );
    }
}
