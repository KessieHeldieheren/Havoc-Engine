<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary;

use Havoc\Engine\Coordinates\Cartesian\CartesianCoordinatesInterface;

/**
 * Havoc Engine grid boundary interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface BoundaryInterface
{
    /**
     * Boundary constructor method.
     */
    public function __construct();
    
    /**
     * Returns x_negative.
     *
     * @return int
     */
    public function getXNegative(): int;
    
    /**
     * Returns x_positive.
     *
     * @return int
     */
    public function getXPositive(): int;
    
    /**
     * Returns y_negative.
     *
     * @return int
     */
    public function getYNegative(): int;
    
    /**
     * Returns y_positive.
     *
     * @return int
     */
    public function getYPositive(): int;
    
    /**
     * Validate that coordinates are in bounds.
     *
     * @param \Havoc\Engine\Coordinates\Cartesian\CartesianCoordinatesInterface $coordinates
     * @return bool
     */
    public function validateCoordinatesInBounds(CartesianCoordinatesInterface $coordinates): bool;
    
    /**
     * Set the X boundary.
     *
     * @param int $x_boundary
     */
    public function setXBoundary(int $x_boundary): void;
    
    /**
     * Set the Y boundary.
     *
     * @param int $y_boundary
     */
    public function setYBoundary(int $y_boundary): void;
}
