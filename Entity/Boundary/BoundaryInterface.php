<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary;

use Havoc\Engine\Config\ConfigControllerInterface;

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
     *
     * @param ConfigControllerInterface $config_controller
     */
    public function __construct(ConfigControllerInterface $config_controller);
    
    /**
     * Returns x_negative.
     *
     * @return int
     */
    public function getXNegative(): int;
    
    /**
     * Sets x_negative.
     *
     * @param int $x_negative
     */
    public function setXNegative(int $x_negative): void;
    
    /**
     * Returns x_positive.
     *
     * @return int
     */
    public function getXPositive(): int;
    
    /**
     * Sets x_positive.
     *
     * @param int $x_positive
     */
    public function setXPositive(int $x_positive): void;
    
    /**
     * Returns y_negative.
     *
     * @return int
     */
    public function getYNegative(): int;
    
    /**
     * Sets y_negative.
     *
     * @param int $y_negative
     */
    public function setYNegative(int $y_negative): void;
    
    /**
     * Returns y_positive.
     *
     * @return int
     */
    public function getYPositive(): int;
    
    /**
     * Sets y_positive.
     *
     * @param int $y_positive
     */
    public function setYPositive(int $y_positive): void;
    
    /**
     * Update grid boundaries.
     */
    public function updateBoundary(): void;
}