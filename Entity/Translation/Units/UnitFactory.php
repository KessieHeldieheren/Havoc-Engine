<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation\Units;

use Havoc\Engine\Entity\Translation\Units\Degrees\Degrees;
use Havoc\Engine\Entity\Translation\Units\Degrees\DegreesInterface;
use Havoc\Engine\Entity\Translation\Units\Distance\Distance;
use Havoc\Engine\Entity\Translation\Units\Distance\DistanceInterface;
use Havoc\Engine\Entity\Translation\Units\Radians\Radians;
use Havoc\Engine\Entity\Translation\Units\Radians\RadiansInterface;

/**
 * Havoc Engine entity translation units factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class UnitFactory
{
    /**
     * Create new degrees.
     *
     * @param float $degrees
     * @return DegreesInterface
     */
    public static function newDegrees(float $degrees): DegreesInterface
    {
        return new Degrees($degrees);
    }
    
    /**
     * Create new radians.
     *
     * @param float $radians
     * @return RadiansInterface
     */
    public static function newRadians(float $radians): RadiansInterface
    {
        return new Radians($radians);
    }
    
    /**
     * Create new distance.
     *
     * @param float $distance
     * @return DistanceInterface
     */
    public static function newDistance(float $distance): DistanceInterface
    {
        return new Distance($distance);
    }
}
