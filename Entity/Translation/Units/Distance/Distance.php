<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation\Units\Distance;

/**
 * Havoc Engine entity translation unit distance.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class Distance implements DistanceInterface
{
    /**
     * Distance.
     *
     * @var float
     */
    private $distance;
    
    /**
     * Distance constructor method.
     *
     * @param float $distance
     */
    public function __construct(float $distance)
    {
        $this->setDistance($distance);
    }
    
    /**
     * Returns distance.
     *
     * @return float
     */
    public function getDistance(): float
    {
        return $this->distance;
    }
    
    /**
     * Sets distance.
     *
     * @param float $distance
     */
    public function setDistance(float $distance): void
    {
        $this->distance = $distance;
    }
}
