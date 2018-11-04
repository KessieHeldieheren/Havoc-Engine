<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation;

use Havoc\Engine\Coordinates\Cartesian\CartesianCoordinatesInterface;
use Havoc\Engine\Coordinates\CoordinatesFactory;
use Havoc\Engine\Coordinates\Polar\PolarCoordinatesInterface;
use Havoc\Engine\Entity\Translation\Units\Degrees\DegreesInterface;
use Havoc\Engine\Entity\Translation\Units\Distance\DistanceInterface;
use Havoc\Engine\Entity\Translation\Units\Radians\RadiansInterface;
use Havoc\Engine\Entity\Translation\Units\UnitFactory;

/**
 * Havoc Engine entity translation helper.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class VectorsHelper
{
    /**
     * Calculate distance between coordinates.
     *
     * @param CartesianCoordinatesInterface $coordinates_from
     * @param CartesianCoordinatesInterface $coordinates_to
     * @return DistanceInterface
     */
    public static function distance(CartesianCoordinatesInterface $coordinates_from, CartesianCoordinatesInterface $coordinates_to): DistanceInterface
    {
        [$x_from, $y_from] = $coordinates_from->array();
        [$x_to, $y_to] = $coordinates_to->array();
        
        $distance = sqrt(($x_to - $x_from) ** 2 + ($y_to - $y_from) ** 2);
        
        return UnitFactory::newDistance($distance);
    }
    
    /**
     * Calculate the radian angle between coordinates.
     *
     * @param CartesianCoordinatesInterface $coordinates_from
     * @param CartesianCoordinatesInterface $coordinates_to
     * @return RadiansInterface
     */
    public static function angle(CartesianCoordinatesInterface $coordinates_from, CartesianCoordinatesInterface $coordinates_to): RadiansInterface
    {
        [$x_from, $y_from] = $coordinates_from->array();
        [$x_to, $y_to] = $coordinates_to->array();
        
        $radians = atan2($y_to - $y_from, $x_to - $x_from);
        
        return UnitFactory::newRadians($radians);
    }
    
    /**
     * Calculate the cartesian coordinates from the radian angle between coordinates.
     *
     * @param CartesianCoordinatesInterface $coordinates_from
     * @param CartesianCoordinatesInterface $coordinates_to
     * @return CartesianCoordinatesInterface
     */
    public static function angleCartesian(CartesianCoordinatesInterface $coordinates_from, CartesianCoordinatesInterface $coordinates_to): CartesianCoordinatesInterface
    {
        $radians = self::angle($coordinates_from, $coordinates_to);
        
        return self::radiansToCartesian($radians);
    }
    
    /**
     * Convert cartesian coordinates to polar coordinates.
     *
     * @param CartesianCoordinatesInterface $coordinates
     * @return PolarCoordinatesInterface
     */
    public static function cartesianToPolar(CartesianCoordinatesInterface $coordinates): PolarCoordinatesInterface
    {
        [$x, $y] = $coordinates->array();
        
        $r = sqrt($x ** 2 + $y ** 2);
        $t = atan($y / $x);
    }
    
    /**
     * Convert polar coordinates to cartesian coordinates.
     *
     * @param PolarCoordinatesInterface $coordinates
     * @return CartesianCoordinatesInterface
     */
    public static function polarToCartesian(PolarCoordinatesInterface $coordinates): CartesianCoordinatesInterface
    {
        [$r, $t] = $coordinates->array();
        
        $x = $r * cos($t);
        $y = $r * sin($t);
        
        return CoordinatesFactory::newCartesian($x, $y);
    }
    
    /**
     * Convert degrees to radians.
     *
     * @param DegreesInterface $degrees
     * @return RadiansInterface
     */
    public static function degreesToRadians(DegreesInterface $degrees): RadiansInterface
    {
        $radians = $degrees->getDegrees() * M_PI / 180;
        
        return UnitFactory::newRadians($radians);
    }
    
    /**
     * Convert radians to degrees.
     *
     * @param RadiansInterface $radians
     * @return DegreesInterface
     */
    public static function radiansToDegrees(RadiansInterface $radians): DegreesInterface
    {
        $degrees = $radians * 180 / M_PI;
        
        return UnitFactory::newDegrees($degrees);
    }
    
    /**
     * Convert radians to cartesian coordinates.
     *
     * @param RadiansInterface $radians
     * @return CartesianCoordinatesInterface
     */
    public static function radiansToCartesian(RadiansInterface $radians): CartesianCoordinatesInterface
    {
        $radians_value = $radians->getRadians();
        
        $x = round(cos($radians_value), 2);
        $y = round(sin($radians_value), 2);
        
        return CoordinatesFactory::newCartesian($x, $y);
    }
}
