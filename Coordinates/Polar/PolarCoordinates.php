<?php
declare(strict_types=1);

namespace Havoc\Engine\Coordinates\Polar;

/**
 * Havoc Engine world polar coordinates.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class PolarCoordinates implements PolarCoordinatesInterface
{
    /**
     * Polar radius.
     *
     * @var float
     */
    private $r;
    
    /**
     * Polar radians.
     *
     * @var float
     */
    private $t;
    
    /**
     * PolarCoordinates constructor method.
     *
     * @param float $r
     * @param float $t
     */
    public function __construct(float $r, float $t)
    {
        $this->setR($r);
        $this->setT($t);
    }
    
    /**
     * Returns r.
     *
     * @return float
     */
    public function getR(): float
    {
        return $this->r;
    }
    
    /**
     * Sets r.
     *
     * @param float $r
     */
    public function setR(float $r): void
    {
        $this->r = $r;
    }
    
    /**
     * Returns t.
     *
     * @return float
     */
    public function getT(): float
    {
        return $this->t;
    }
    
    /**
     * Sets t.
     *
     * @param float $t
     */
    public function setT(float $t): void
    {
        $this->t = $t;
    }
    
    /**
     * Clone coordinates.
     *
     * @return PolarCoordinatesInterface
     */
    public function clone(): PolarCoordinatesInterface
    {
        return clone $this;
    }
    
    /**
     * Return rounded coordinates that fit on the grid precisely.
     *
     * @return PolarCoordinatesInterface
     */
    public function rounded(): PolarCoordinatesInterface
    {
        $coordinates = clone $this;
        
        $coordinates->setR(round($coordinates->getR(), 0, PHP_ROUND_HALF_DOWN));
        $coordinates->setT(round($coordinates->getT(), 0, PHP_ROUND_HALF_DOWN));
        
        return $coordinates;
    }
    
    /**
     * Format coordinates as array.
     *
     * @return array
     */
    public function array(): array
    {
        return [$this->getR(), $this->getT()];
    }
    
    /**
     * Format coordinates as string.
     *
     * @return string
     */
    public function string(): string
    {
        return sprintf("%s,%s", $this->getR(), $this->getT());
    }
}
