<?php
declare(strict_types=1);

namespace Havoc\Engine\Grid\GridView;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Coordinates\CoordinatesFactory;
use Havoc\Engine\Coordinates\CoordinatesInterface;

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
     * @var CoordinatesInterface
     */
    private $center_view;
    
    /**
     * Lowest coordinates visible on the X axis.
     *
     * @var int
     */
    private $negative_x_view;
    
    /**
     * Highest coordinates visible on the X axis.
     *
     * @var int
     */
    private $positive_x_view;
    
    /**
     * Lowest coordinates visible on the Y axis.
     *
     * @var int
     */
    private $negative_y_view;
    
    /**
     * Highest coordinates visible on the Y axis.
     *
     * @var int
     */
    private $positive_y_view;
    
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
        $this->setCenterView(CoordinatesFactory::new());
        $this->updateViewAxes();
    }
    
    /**
     * Update view axes.
     */
    public function updateViewAxes(): void
    {
        $this->setNegativeXView();
        $this->setPositiveXView();
        $this->setNegativeYView();
        $this->setPositiveYView();
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
     * @param int $x_width
     */
    public function setXWidth(int $x_width): void
    {
        $this->x_width = $x_width;
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
     * @param int $y_width
     */
    public function setYWidth(int $y_width): void
    {
        $this->y_width = $y_width;
    }
    
    /**
     * Returns center.
     *
     * @return CoordinatesInterface
     */
    public function getCenterView(): CoordinatesInterface
    {
        return $this->center_view;
    }
    
    /**
     * Sets center.
     *
     * @param CoordinatesInterface $center_view
     */
    public function setCenterView(CoordinatesInterface $center_view): void
    {
        $this->center_view = $center_view;
    }
    
    /**
     * Returns negative_x_view.
     *
     * @return int
     */
    public function getNegativeXView(): int
    {
        return $this->negative_x_view;
    }
    
    /**
     * Sets negative_x_view.
     */
    public function setNegativeXView(): void
    {
        $this->negative_x_view = (int) $this->getCenterView()->getX() - ($this->getXWidth() / 2);
    }
    
    /**
     * Returns positive_x_view.
     *
     * @return int
     */
    public function getPositiveXView(): int
    {
        return $this->positive_x_view;
    }
    
    /**
     * Sets positive_x_view.
     */
    public function setPositiveXView(): void
    {
        $this->positive_x_view = (int) $this->getCenterView()->getX() + ($this->getXWidth() / 2);
    }
    
    /**
     * Returns negative_y_view.
     *
     * @return int
     */
    public function getNegativeYView(): int
    {
        return $this->negative_y_view;
    }
    
    /**
     * Sets negative_y_view.
     */
    public function setNegativeYView(): void
    {
        $this->negative_y_view = (int) $this->getCenterView()->getY() - ($this->getYWidth() / 2);
    }
    
    /**
     * Returns positive_y_view.
     *
     * @return int
     */
    public function getPositiveYView(): int
    {
        return $this->positive_y_view;
    }
    
    /**
     * Sets positive_y_view.
     */
    public function setPositiveYView(): void
    {
        $this->positive_y_view = (int) $this->getCenterView()->getY() + ($this->getYWidth() / 2);
    }
}
