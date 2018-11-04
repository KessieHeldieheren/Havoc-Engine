<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary;

use Havoc\Engine\Coordinates\Cartesian\CartesianCoordinatesInterface;

/**
 * Havoc Engine grid boundary.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class Boundary implements BoundaryInterface
{
    public const X_BOUNDARY_DEFAULT = 9000000000000000000;
    public const Y_BOUNDARY_DEFAULT = 9000000000000000000;
    public const X_BOUNDARY_MAX = 9000000000000000000;
    public const Y_BOUNDARY_MAX = 9000000000000000000;
    
    /**
     * X negative axis boundary.
     *
     * @var int
     */
    private $x_negative;
    
    /**
     * X positive axis boundary.
     *
     * @var int
     */
    private $x_positive;
    
    /**
     * Y negative axis boundary.
     *
     * @var int
     */
    private $y_negative;
    
    /**
     * Y positive axis boundary.
     *
     * @var int
     */
    private $y_positive;
    
    /**
     * Boundary constructor method.
     */
    public function __construct()
    {
        $this->setInitialBoundaries();
    }
    
    /**
     * Validate that coordinates are in bounds.
     *
     * @param CartesianCoordinatesInterface $coordinates
     * @return bool
     */
    public function validateCoordinatesInBounds(CartesianCoordinatesInterface $coordinates): bool
    {
        [$x, $y] = $coordinates->array();
    
        return !(
            $x < $this->getXNegative() === false &&
            $x > $this->getXPositive() === false &&
            $y < $this->getYNegative() === false &&
            $y > $this->getYPositive() === false
        );
    }
    
    /**
     * Set boundaries to their defaults.
     */
    protected function setInitialBoundaries(): void
    {
        $this->setXBoundary(self::X_BOUNDARY_DEFAULT);
        $this->setYBoundary(self::Y_BOUNDARY_DEFAULT);
    }
    
    /**
     * Set the X boundary.
     *
     * @param int $x_boundary
     */
    public function setXBoundary(int $x_boundary): void
    {
        if ($x_boundary === 0) {
            $this->setXNegative(0 - self::X_BOUNDARY_MAX);
            $this->setXPositive(self::X_BOUNDARY_MAX);
            
            return;
        }
        
        if ($x_boundary > self::X_BOUNDARY_MAX) {
            throw BoundaryException::xGridOverMax($x_boundary);
        }
        
        $this->setXNegative(0 - $x_boundary);
        $this->setXPositive($x_boundary);
    }
    
    /**
     * Set the Y boundary.
     *
     * @param int $y_boundary
     */
    public function setYBoundary(int $y_boundary): void
    {
        if ($y_boundary === 0) {
            $this->setYNegative(0 - self::Y_BOUNDARY_MAX);
            $this->setYPositive(self::Y_BOUNDARY_MAX);
        
            return;
        }
        
        if ($y_boundary > self::Y_BOUNDARY_MAX) {
            throw BoundaryException::yGridOverMax($y_boundary);
        }
        
        $this->setYNegative(0 - $y_boundary);
        $this->setYPositive($y_boundary);
    }
    
    /**
     * Returns x_negative.
     *
     * @return int
     */
    public function getXNegative(): int
    {
        return $this->x_negative;
    }
    
    /**
     * Sets x_negative.
     *
     * @param int $x_negative
     */
    public function setXNegative(int $x_negative): void
    {
        $this->x_negative = $x_negative;
    }
    
    /**
     * Returns x_positive.
     *
     * @return int
     */
    public function getXPositive(): int
    {
        return $this->x_positive;
    }
    
    /**
     * Sets x_positive.
     *
     * @param int $x_positive
     */
    public function setXPositive(int $x_positive): void
    {
        $this->x_positive = $x_positive;
    }
    
    /**
     * Returns y_negative.
     *
     * @return int
     */
    public function getYNegative(): int
    {
        return $this->y_negative;
    }
    
    /**
     * Sets y_negative.
     *
     * @param int $y_negative
     */
    public function setYNegative(int $y_negative): void
    {
        $this->y_negative = $y_negative;
    }
    
    /**
     * Returns y_positive.
     *
     * @return int
     */
    public function getYPositive(): int
    {
        return $this->y_positive;
    }
    
    /**
     * Sets y_positive.
     *
     * @param int $y_positive
     */
    public function setYPositive(int $y_positive): void
    {
        $this->y_positive = $y_positive;
    }
}
