<?php
declare(strict_types=1);

namespace Havoc\Engine\Coordinates;

use Havoc\Engine\Config\DefaultConfig;

/**
 * Havoc Engine world coordinates.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
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
    
    /**
     * Clone coordinates.
     *
     * @return CoordinatesInterface
     */
    public function clone(): CoordinatesInterface
    {
        return clone $this;
    }
    
    /**
     * Return rounded coordinates that fit on the grid precisely.
     *
     * @return CoordinatesInterface
     */
    public function rounded(): CoordinatesInterface
    {
        $coordinates = clone $this;
        
        $coordinates->setX(round($coordinates->getX(), 0));
        $coordinates->setY(round($coordinates->getY(), 0));
        
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
        return sprintf(DefaultConfig::COORDINATES_FORMAT, $this->getX(), $this->getY());
    }
}
