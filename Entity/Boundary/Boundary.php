<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary;

use Havoc\Engine\Config\ConfigControllerInterface;

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
     * @param ConfigControllerInterface $config_controller
     */
    public function __construct(ConfigControllerInterface $config_controller)
    {
        $this->setConfigController($config_controller);
        $this->updateBoundary();
    }
    
    /**
     * Update grid boundaries.
     */
    public function updateBoundary(): void
    {
        $config_controller = $this->getConfigController();
    
        $this->setXNegative(0 - $config_controller->getXBoundary());
        $this->setXPositive($config_controller->getXBoundary());
        $this->setYNegative(0 - $config_controller->getYBoundary());
        $this->setYPositive($config_controller->getYBoundary());
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
