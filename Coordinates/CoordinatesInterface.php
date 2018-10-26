<?php
declare(strict_types=1);

namespace Havoc\Engine\Coordinates;

/**
 * Havoc Engine world coordinates interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface CoordinatesInterface
{
    /**
     * Coordinates constructor method.
     *
     * @param float $x
     * @param float $y
     */
    public function __construct(float $x = 0.0, float $y = 0.0);
    
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
