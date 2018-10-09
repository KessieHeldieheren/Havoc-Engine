<?php
declare(strict_types=1);

namespace Havoc\Engine\Factories;

use Havoc\Engine\Coordinates\Coordinates;
use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\Exceptions\FactoryException;
use ReflectionClass;

/**
 * Havoc Engine world coordinates factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
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
    public static function new(float $x, float $y, string $coordinates_class = Coordinates::class): CoordinatesInterface
    {
        $reflects = (new ReflectionClass($coordinates_class))->implementsInterface(CoordinatesInterface::class);
        
        if (false === $reflects) {
            throw FactoryException::configControllerBadClass($coordinates_class);
        }
        
        /** @var CoordinatesInterface $coordinates */
        $coordinates = new $coordinates_class();
        
        $coordinates->setX($x);
        $coordinates->setY($y);
        
        return $coordinates;
    }
    
    /**
     * Create a new set of coordinates at the origin (1:1) coordinates.
     *
     * @param string $coordinates_class
     * @return CoordinatesInterface
     */
    public static function newAtOrigin(string $coordinates_class = Coordinates::class): CoordinatesInterface
    {
        return self::new(1, 1, $coordinates_class);
    }
    
    /**
     * Clone a set of world coordinates.
     *
     * @param CoordinatesInterface $coordinates
     * @return CoordinatesInterface
     */
    public static function clone(CoordinatesInterface $coordinates): CoordinatesInterface
    {
        return clone $coordinates;
    }
}
