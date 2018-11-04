<?php
declare(strict_types=1);

namespace Havoc\Engine\Grid\GridView;

use Havoc\Engine\Coordinates\Cartesian\CartesianCoordinatesInterface;

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
     */
    public function __construct();
    
    /**
     * Returns x.
     *
     * @return int
     */
    public function getXView(): int;
    
    /**
     * Sets x.
     *
     * @param int $x_width
     */
    public function setXView(int $x_width): void;
    
    /**
     * Returns y.
     *
     * @return int
     */
    public function getYView(): int;
    
    /**
     * Sets y.
     *
     * @param int $y_width
     */
    public function setYView(int $y_width): void;
    
    /**
     * Returns center.
     *
     * @return CartesianCoordinatesInterface
     */
    public function getCenterCoordinates(): CartesianCoordinatesInterface;
    
    /**
     * Sets center.
     *
     * @param CartesianCoordinatesInterface $center
     */
    public function setCenterCoordinates(CartesianCoordinatesInterface $center): void;
    
    /**
     * Returns negative_x_view.
     *
     * @return int
     */
    public function getLowestX(): int;
    
    /**
     * Returns positive_x_view.
     *
     * @return int
     */
    public function getHighestX(): int;
    
    /**
     * Returns negative_y_view.
     *
     * @return int
     */
    public function getLowestY(): int;
    
    /**
     * Returns positive_y_view.
     *
     * @return int
     */
    public function getHighestY(): int;
    
    /**
     * Validate that coordinates are in the grid view.
     *
     * @param CartesianCoordinatesInterface $coordinates
     * @return bool
     */
    public function validateCoordinatesInView(CartesianCoordinatesInterface $coordinates): bool;
}
