<?php
declare(strict_types=1);

namespace Havoc\Engine\Coordinates\Polar;

/**
 * Havoc Engine world polar coordinates interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface PolarCoordinatesInterface
{
    /**
     * PolarCoordinates constructor method.
     *
     * @param float $r
     * @param float $t
     */
    public function __construct(float $r, float $t);
    
    /**
     * Format coordinates as string.
     *
     * @return string
     */
    public function string(): string;
    
    /**
     * Clone coordinates.
     *
     * @return PolarCoordinatesInterface
     */
    public function clone(): PolarCoordinatesInterface;
    
    /**
     * Return rounded coordinates that fit on the grid precisely.
     *
     * @return PolarCoordinatesInterface
     */
    public function rounded(): PolarCoordinatesInterface;
    
    /**
     * Returns t.
     *
     * @return float
     */
    public function getT(): float;
    
    /**
     * Sets t.
     *
     * @param float $t
     */
    public function setT(float $t): void;
    
    /**
     * Returns r.
     *
     * @return float
     */
    public function getR(): float;
    
    /**
     * Sets r.
     *
     * @param float $r
     */
    public function setR(float $r): void;
    
    /**
     * Format coordinates as array.
     *
     * @return array
     */
    public function array(): array;
}
