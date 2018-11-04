<?php
declare(strict_types=1);

namespace Havoc\Engine\Coordinates;

use Havoc\Engine\Coordinates\Cartesian\CartesianCoordinates;
use Havoc\Engine\Coordinates\Cartesian\CartesianCoordinatesInterface;
use Havoc\Engine\Coordinates\Polar\PolarCoordinatesInterface;
use Havoc\Engine\Core\EngineException;

/**
 * Havoc Engine configuration exceptions.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class CoordinatesException extends EngineException
{
    public const CARTESIAN_COORDINATES_BAD_CLASS = 0x1;
    public const POLAR_COORDINATES_BAD_CLASS = 0x2;
    public const X_OVER_MAX = 0x3;
    public const X_UNDER_MIN = 0x4;
    public const Y_OVER_MAX = 0x5;
    public const Y_UNDER_MIN = 0x6;
    
    /**
     * @param string $given_class
     * @return CoordinatesException
     */
    public static function cartesianCoordinatesBadClass(string $given_class): self
    {
        $required_class = CartesianCoordinatesInterface::class;
        
        return new self (
            sprintf("Cannot create a set of coordinates using %s, as it must implement %s.", $given_class, $required_class),
            self::CARTESIAN_COORDINATES_BAD_CLASS
        );
    }
    
    /**
     * @param string $given_class
     * @return CoordinatesException
     */
    public static function polarCoordinatesBadClass(string $given_class): self
    {
        $required_class = PolarCoordinatesInterface::class;
        
        return new self (
            sprintf("Cannot create a set of coordinates using %s, as it must implement %s.", $given_class, $required_class),
            self::POLAR_COORDINATES_BAD_CLASS
        );
    }
    
    /**
     * @param float $value
     * @return CoordinatesException
     */
    public static function xCartesianOverMax(float $value): self
    {
        $max = CartesianCoordinates::X_MAX;
        
        return new self (
            sprintf("Cannot set an X coordinate to %s, as the maximum is %s.", $value, $max),
            self::X_OVER_MAX
        );
    }
    
    /**
     * @param float $value
     * @return CoordinatesException
     */
    public static function xCartesianUnderMin(float $value): self
    {
        $min = CartesianCoordinates::X_MIN;
        
        return new self (
            sprintf("Cannot set an X coordinate to %s, as the minimum is %s.", $value, $min),
            self::X_UNDER_MIN
        );
    }
    
    /**
     * @param float $value
     * @return CoordinatesException
     */
    public static function yCartesianOverMax(float $value): self
    {
        $max = CartesianCoordinates::Y_MAX;
        
        return new self (
            sprintf("Cannot set a Y coordinate to %s, as the maximum is %s.", $value, $max),
            self::Y_OVER_MAX
        );
    }
    
    /**
     * @param float $value
     * @return CoordinatesException
     */
    public static function yCartesianUnderMin(float $value): self
    {
        $min = CartesianCoordinates::Y_MIN;
        
        return new self (
            sprintf("Cannot set a Y coordinate to %s, as the minimum is %s.", $value, $min),
            self::Y_UNDER_MIN
        );
    }
}
