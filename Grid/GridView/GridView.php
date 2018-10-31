<?php
declare(strict_types=1);

namespace Havoc\Engine\Grid\GridView;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Coordinates\CoordinatesFactory;
use Havoc\Engine\Coordinates\Cartesian\CartesianCoordinatesInterface;

/**
 * Havoc Engine grid view.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class GridView implements GridViewInterface
{
    /**
     * Configuration controller.
     *
     * @var ConfigControllerInterface
     */
    private $config_controller;
    
    /**
     * Grid view X width
     *
     * @var int
     */
    private $x_width;
    
    /**
     * Grid view Y width.
     *
     * @var int
     */
    private $y_width;
    
    /**
     * Grid view center coordinates.
     *
     * @var CartesianCoordinatesInterface
     */
    private $center_coordinates;
    
    /**
     * GridView constructor method.
     *
     * @param ConfigControllerInterface $config_controller
     */
    public function __construct(ConfigControllerInterface $config_controller)
    {
        $this->setConfigController($config_controller);
        $this->setXWidth($config_controller->getXView());
        $this->setYWidth($config_controller->getYView());
        $this->setCenterCoordinates(CoordinatesFactory::newCartesian());
    }
    
    /**
     * Validate that coordinates are in the grid view.
     *
     * @param CartesianCoordinatesInterface $coordinates
     * @return bool
     */
    public function validateCoordinatesInView(CartesianCoordinatesInterface $coordinates): bool
    {
        [$x, $y] = $coordinates->array();
    
        if ($x < $this->getLowestX()) {
            return false;
        }
    
        if ($x > $this->getHighestX()) {
            return false;
        }
    
        if ($y < $this->getLowestY()) {
            return false;
        }
    
        if ($y > $this->getHighestY()) {
            return false;
        }
    
        return true;
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
     * Returns x.
     *
     * @return int
     */
    public function getXWidth(): int
    {
        return $this->x_width;
    }
    
    /**
     * Sets x.
     *
     * +1 sets width even for both directions.
     *
     * @param int $x_width
     */
    public function setXWidth(int $x_width): void
    {
        $this->x_width = $x_width + 1;
    }
    
    /**
     * Returns y.
     *
     * @return int
     */
    public function getYWidth(): int
    {
        return $this->y_width;
    }
    
    /**
     * Sets y.
     *
     * +1 sets width even for both directions.
     *
     * @param int $y_width
     */
    public function setYWidth(int $y_width): void
    {
        $this->y_width = $y_width + 1;
    }
    
    /**
     * Returns center.
     *
     * @return CartesianCoordinatesInterface
     */
    public function getCenterCoordinates(): CartesianCoordinatesInterface
    {
        return $this->center_coordinates;
    }
    
    /**
     * Sets center.
     *
     * @param CartesianCoordinatesInterface $center_coordinates
     */
    public function setCenterCoordinates(CartesianCoordinatesInterface $center_coordinates): void
    {
        $this->center_coordinates = $center_coordinates;
    }
    
    /**
     * Returns negative_x_view.
     *
     * @return int
     */
    public function getLowestX(): int
    {
        return (int) ($this->getCenterCoordinates()->getX() - ($this->getXWidth() / 2));
    }
    
    /**
     * Returns positive_x_view.
     *
     * @return int
     */
    public function getHighestX(): int
    {
        return (int) ($this->getCenterCoordinates()->getX() + ($this->getXWidth() / 2));
    }
    
    /**
     * Returns negative_y_view.
     *
     * @return int
     */
    public function getLowestY(): int
    {
        return (int) ($this->getCenterCoordinates()->getY() - ($this->getYWidth() / 2));
    }
    
    /**
     * Returns positive_y_view.
     *
     * @return int
     */
    public function getHighestY(): int
    {
        return (int) ($this->getCenterCoordinates()->getY() + ($this->getYWidth() / 2));
    }
}
