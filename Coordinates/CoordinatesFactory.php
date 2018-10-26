<?php
declare(strict_types=1);

namespace Havoc\Engine\Coordinates;

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
     * Create a new set of world coordinates.
     *
     * @param float $x
     * @param float $y
     * @param string $coordinates_class
     * @return CoordinatesInterface
     */
    public static function new(float $x = 0.0, float $y = 0.0, string $coordinates_class = Coordinates::class): CoordinatesInterface
    {
        $reflects = (new ReflectionClass($coordinates_class))->implementsInterface(CoordinatesInterface::class);
        
        if ($reflects === false) {
            throw CoordinatesException::coordinatesBadClass($coordinates_class);
        }
    
        return new $coordinates_class($x, $y);
    }
}
