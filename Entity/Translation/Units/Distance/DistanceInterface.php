<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation\Units\Distance;

/**
 * Havoc Engine entity translation unit distance interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface DistanceInterface
{
    /**
     * Distance constructor method.
     *
     * @param float $distance
     */
    public function __construct(float $distance);
    
    /**
     * Returns distance.
     *
     * @return float
     */
    public function getDistance(): float;
    
    /**
     * Sets distance.
     *
     * @param float $distance
     */
    public function setDistance(float $distance): void;
}
