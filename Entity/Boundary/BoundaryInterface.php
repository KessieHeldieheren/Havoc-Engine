<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Coordinates\CoordinatesInterface;

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
     * @param CoordinatesInterface $coordinates
     * @return bool
     */
    public function validateCoordinatesInBounds(CoordinatesInterface $coordinates): bool;
}
