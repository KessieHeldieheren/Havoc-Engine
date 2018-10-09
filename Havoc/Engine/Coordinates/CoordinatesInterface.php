<?php
declare(strict_types=1);

namespace Havoc\Engine\Coordinates;

/**
 * Havoc Engine world coordinates interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
interface CoordinatesInterface
{
    /**
     * Returns x.
     *
     * @return float
     */
    public function getX(): float;
    
    /**
     * Sets x.
     *
     * @param float $x
     */
    public function setX(float $x): void;
    
    /**
     * Returns y.
     *
     * @return float
     */
    public function getY(): float;
    
    /**
     * Sets y.
     *
     * @param float $y
     */
    public function setY(float $y): void;
}
