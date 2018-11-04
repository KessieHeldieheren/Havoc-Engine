<?php
declare(strict_types=1);

namespace Havoc\Engine\Grid\GridView;

use Havoc\Engine\Coordinates\CoordinatesFactory;
use Havoc\Engine\Coordinates\Cartesian\CartesianCoordinatesInterface;
use Havoc\Engine\Grid\GridException;

/**
 * Havoc Engine grid view.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class GridView implements GridViewInterface
{
    public const X_VIEW_DEFAULT = 16;
    public const Y_VIEW_DEFAULT = 16;
    public const X_VIEW_MAX = 128;
    public const Y_VIEW_MAX = 128;
    
    /**
     * Grid view X width
     *
     * @var int
     */
    private $x_view;
    
    /**
     * Grid view Y width.
     *
     * @var int
     */
    private $y_view;
    
    /**
     * Grid view center coordinates.
     *
     * @var CartesianCoordinatesInterface
     */
    private $center_coordinates;
    
    /**
     * GridView constructor method.
     */
    public function __construct()
    {
        $this->setXView(self::X_VIEW_DEFAULT);
        $this->setYView(self::Y_VIEW_DEFAULT);
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
     * Returns x.
     *
     * @return int
     */
    public function getXView(): int
    {
        return $this->x_view;
    }
    
    /**
     * Sets x.
     *
     * +1 sets width even for both directions.
     *
     * @param int $x_view
     */
    public function setXView(int $x_view): void
    {
        if ($x_view > self::X_VIEW_MAX) {
            throw GridException::xViewOverMax($x_view);
        }
        
        $this->x_view = $x_view + 1;
    }
    
    /**
     * Returns y.
     *
     * @return int
     */
    public function getYView(): int
    {
        return $this->y_view;
    }
    
    /**
     * Sets y.
     *
     * +1 sets width even for both directions.
     *
     * @param int $y_view
     */
    public function setYView(int $y_view): void
    {
        if ($y_view > self::Y_VIEW_MAX) {
            throw GridException::yViewOverMax($y_view);
        }
        
        $this->y_view = $y_view + 1;
    }
    
    /**
     * Returns center.
     *
     * @return CartesianCoordinatesInterface
     */
    public function getCenterCoordinates(): CartesianCoordinatesInterface
    {
        return $this->center_coordinates->rounded();
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
        return (int) ($this->getCenterCoordinates()->getX() - ($this->getXView() / 2));
    }
    
    /**
     * Returns positive_x_view.
     *
     * @return int
     */
    public function getHighestX(): int
    {
        return (int) ($this->getCenterCoordinates()->getX() + ($this->getXView() / 2));
    }
    
    /**
     * Returns negative_y_view.
     *
     * @return int
     */
    public function getLowestY(): int
    {
        return (int) ($this->getCenterCoordinates()->getY() - ($this->getYView() / 2));
    }
    
    /**
     * Returns positive_y_view.
     *
     * @return int
     */
    public function getHighestY(): int
    {
        return (int) ($this->getCenterCoordinates()->getY() + ($this->getYView() / 2));
    }
}
