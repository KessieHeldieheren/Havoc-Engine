<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Coordinates\CoordinatesInterface;

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
     * Configuration controller.
     *
     * @var ConfigControllerInterface
     */
    private $config_controller;
    
    /**
     * Boundary constructor method.
     *
     * @param ConfigControllerInterface $config_controller
     */
    public function __construct(ConfigControllerInterface $config_controller)
    {
        $this->setConfigController($config_controller);
    }
    
    /**
     * Validate that coordinates are in bounds.
     *
     * @param CoordinatesInterface $coordinates
     * @return bool
     */
    public function validateCoordinatesInBounds(CoordinatesInterface $coordinates): bool
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
     * Returns config_controller.
     *
     * @return ConfigControllerInterface
     */
    public function getConfigController(): ConfigControllerInterface
    {
        return $this->config_controller;
    }
    
    /**
     * Sets config_controller.
     *
     * @param ConfigControllerInterface $config_controller
     */
    public function setConfigController(ConfigControllerInterface $config_controller): void
    {
        $this->config_controller = $config_controller;
    }
    
    /**
     * Returns x_negative.
     *
     * @return int
     */
    public function getXNegative(): int
    {
        return 0 - $this->getConfigController()->getXBoundary();
    }
    
    /**
     * Returns x_positive.
     *
     * @return int
     */
    public function getXPositive(): int
    {
        return $this->getConfigController()->getXBoundary();
    }
    
    /**
     * Returns y_negative.
     *
     * @return int
     */
    public function getYNegative(): int
    {
        return 0 - $this->getConfigController()->getYBoundary();
    }
    
    /**
     * Returns y_positive.
     *
     * @return int
     */
    public function getYPositive(): int
    {
        return $this->getConfigController()->getYBoundary();
    }
}
