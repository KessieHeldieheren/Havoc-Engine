<?php
declare(strict_types=1);

namespace Havoc\Engine\Coordinates;

/**
 * Havoc Engine world coordinates.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class Coordinates implements CoordinatesInterface
{
    /**
     * Coordinates on the X axis.
     *
     * @var float
     */
    private $x = 0.0;
    
    /**
     * Coordinates on the Y axis.
     *
     * @var float
     */
    private $y = 0.0;
    
    /**
     * Returns x.
     *
     * @return float
     */
    public function getX(): float
    {
        return $this->x;
    }
    
    /**
     * Sets x.
     *
     * @param float $x
     */
    public function setX(float $x): void
    {
        $this->x = $x;
    }
    
    /**
     * Returns y.
     *
     * @return float
     */
    public function getY(): float
    {
        return $this->y;
    }
    
    /**
     * Sets y.
     *
     * @param float $y
     */
    public function setY(float $y): void
    {
        $this->y = $y;
    }
}
