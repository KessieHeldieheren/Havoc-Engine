<?php
declare(strict_types=1);

namespace Havoc\Engine\Coordinates;

use Havoc\Engine\Coordinates\Cartesian\CartesianCoordinatesInterface;
use Havoc\Engine\Coordinates\Polar\PolarCoordinatesInterface;
use Havoc\Engine\Exceptions\EngineException;

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
}
