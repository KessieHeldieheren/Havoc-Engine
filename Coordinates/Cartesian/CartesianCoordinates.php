<?php
declare(strict_types=1);

namespace Havoc\Engine\Coordinates\Cartesian;

/**
 * Havoc Engine world cartesian coordinates.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class CartesianCoordinates implements CartesianCoordinatesInterface
{
    /**
     * Coordinates on the X axis.
     *
     * @var float
     */
    private $x;
    
    /**
     * Coordinates on the Y axis.
     *
     * @var float
     */
    private $y;
    
    /**
     * Coordinates constructor method.
     *
     * @param float $x
     * @param float $y
     */
    public function __construct(float $x = 0.0, float $y = 0.0)
    {
        $this->setX($x);
        $this->setY($y);
    }
    
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
    
    /**
     * Clone coordinates.
     *
     * @return CartesianCoordinatesInterface
     */
    public function clone(): CartesianCoordinatesInterface
    {
        return clone $this;
    }
    
    /**
     * Return rounded coordinates that fit on the grid precisely.
     *
     * @return CartesianCoordinatesInterface
     */
    public function rounded(): CartesianCoordinatesInterface
    {
        $coordinates = clone $this;
        
        $coordinates->setX(round($coordinates->getX(), 0, PHP_ROUND_HALF_DOWN));
        $coordinates->setY(round($coordinates->getY(), 0), PHP_ROUND_HALF_DOWN);
        
        return $coordinates;
    }
    
    /**
     * Format coordinates as array.
     *
     * @return array
     */
    public function array(): array
    {
        return [$this->getX(), $this->getY()];
    }
    
    /**
     * Format coordinates as string.
     *
     * @return string
     */
    public function string(): string
    {
        return sprintf("%s:%s", $this->getX(), $this->getY());
    }
}
