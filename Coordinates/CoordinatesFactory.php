<?php
declare(strict_types=1);

namespace Havoc\Engine\Coordinates;

use Havoc\Engine\Coordinates\Cartesian\CartesianCoordinates;
use Havoc\Engine\Coordinates\Cartesian\CartesianCoordinatesInterface;
use Havoc\Engine\Coordinates\Polar\PolarCoordinates;
use Havoc\Engine\Coordinates\Polar\PolarCoordinatesInterface;
use ReflectionClass;

/**
 * Havoc Engine world coordinates factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class CoordinatesFactory
{
    /**
     * Create a new set of world cartesian coordinates.
     *
     * @param float $x
     * @param float $y
     * @param string $class_name
     * @return CartesianCoordinatesInterface
     */
    public static function newCartesian(float $x = 0.0, float $y = 0.0, string $class_name = CartesianCoordinates::class): CartesianCoordinatesInterface
    {
        $reflects = (new ReflectionClass($class_name))->implementsInterface(CartesianCoordinatesInterface::class);
        
        if ($reflects === false) {
            throw CoordinatesException::cartesianCoordinatesBadClass($class_name);
        }
    
        return new $class_name($x, $y);
    }
    
    /**
     * Create a new set of world polar coordinates.
     *
     * @param float $r
     * @param float $t
     * @param string $class_name
     * @return PolarCoordinatesInterface
     */
    public static function newPolar(float $r = 0.0, float $t = 0.0, string $class_name = PolarCoordinates::class): PolarCoordinatesInterface
    {
        $reflects = (new ReflectionClass($class_name))->implementsInterface(PolarCoordinatesInterface::class);
    
        if ($reflects === false) {
            throw CoordinatesException::polarCoordinatesBadClass($class_name);
        }
    
        return new $class_name($r, $t);
    }
}
