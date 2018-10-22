<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary;

/**
 * Havoc Engine grid boundary.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class Boundary implements BoundaryInterface
{
    /**
     * Boundary along the X negative axis.
     *
     * @var int
     */
    private $x_negative;
    
    /**
     * Boundary along the X positive axis.
     *
     * @var int
     */
    private $x_positive;
    
    /**
     * Boundary along the Y negative axis.
     *
     * @var int
     */
    private $y_negative;
    
    /**
     * Boundary along the Y positive axis.
     *
     * @var int
     */
    private $y_positive;
    
    /**
     * Boundary constructor method.
     *
     * @param int $x_negative
     * @param int $x_positive
     * @param int $y_negative
     * @param int $y_positive
     */
    public function __construct(int $x_negative, int $x_positive, int $y_negative, int $y_positive)
    {
        $this->setXNegative($x_negative);
        $this->setXPositive($x_positive);
        $this->setYNegative($y_negative);
        $this->setYPositive($y_positive);
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
