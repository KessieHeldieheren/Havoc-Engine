<?php
declare(strict_types=1);

namespace Havoc\Engine\Coordinates;

/**
 * Havoc Core world coordinates interface.
 *
 * @package Havoc-Core
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
    
    /**
     * Clone coordinates.
     *
     * @return CoordinatesInterface
     */
    public function clone(): CoordinatesInterface;
    
    /**
     * Return rounded coordinates that fit on the grid precisely.
     *
     * @return CoordinatesInterface
     */
    public function rounded(): CoordinatesInterface;
    
    /**
     * Format coordinates as array.
     *
     * @return array
     */
    public function array(): array;
    
    /**
     * Format coordinates as string.
     *
     * @return string
     */
    public function string(): string;
}
