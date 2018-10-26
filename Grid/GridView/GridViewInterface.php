<?php
declare(strict_types=1);

namespace Havoc\Engine\Grid\GridView;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Coordinates\CoordinatesInterface;

/**
 * Havoc Engine grid view interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface GridViewInterface
{
    /**
     * GridView constructor method.
     *
     * @param ConfigControllerInterface $config_controller
     */
    public function __construct(ConfigControllerInterface $config_controller);
    
    /**
     * Update view axes.
     */
    public function updateViewAxes(): void;
    
    /**
     * Returns x.
     *
     * @return int
     */
    public function getXWidth(): int;
    
    /**
     * Sets x.
     *
     * @param int $x_width
     */
    public function setXWidth(int $x_width): void;
    
    /**
     * Returns y.
     *
     * @return int
     */
    public function getYWidth(): int;
    
    /**
     * Sets y.
     *
     * @param int $y_width
     */
    public function setYWidth(int $y_width): void;
    
    /**
     * Returns center.
     *
     * @return CoordinatesInterface
     */
    public function getCenterCoordinates(): CoordinatesInterface;
    
    /**
     * Sets center.
     *
     * @param CoordinatesInterface $center
     */
    public function setCenterCoordinates(CoordinatesInterface $center): void;
    
    /**
     * Returns negative_x_view.
     *
     * @return int
     */
    public function getLowestX(): int;
    
    /**
     * Sets negative_x_view.
     */
    public function setLowestX(): void;
    
    /**
     * Returns positive_x_view.
     *
     * @return int
     */
    public function getHighestX(): int;
    
    /**
     * Sets positive_x_view.
     */
    public function setHighestX(): void;
    
    /**
     * Returns negative_y_view.
     *
     * @return int
     */
    public function getLowestY(): int;
    
    /**
     * Sets negative_y_view.
     */
    public function setLowestY(): void;
    
    /**
     * Returns positive_y_view.
     *
     * @return int
     */
    public function getHighestY(): int;
    
    /**
     * Sets positive_y_view.
     */
    public function setHighestY(): void;
    
    /**
     * Validate that coordinates are in the grid view.
     *
     * @param CoordinatesInterface $coordinates
     * @return bool
     */
    public function validateCoordinatesInView(CoordinatesInterface $coordinates): bool;
}
