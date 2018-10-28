<?php
declare(strict_types=1);

namespace Havoc\Engine\Grid\GridSupervisor;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Coordinates\CoordinatesFactory;
use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\Entity\Boundary\BoundaryInterface;
use Havoc\Engine\Grid\GridView\GridViewInterface;
use Havoc\Engine\WorldPoint\WorldPointFactory;
use Havoc\Engine\WorldPoint\WorldPointInterface;

/**
 * Havoc Engine grid supervisor.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class GridSupervisor implements GridSupervisorInterface
{
    /**
     * Configuration controller.
     *
     * @var ConfigControllerInterface
     */
    private $config_controller;
    
    /**
     * Grid index.
     *
     * @var int
     */
    private $index = 0;
    
    /**
     * Grid array.
     *
     * @var WorldPointInterface[]
     */
    private $grid = [];
    
    /**
     * Grid view.
     *
     * @var GridViewInterface
     */
    private $grid_view;
    
    /**
     * Grid boundary.
     *
     * @var BoundaryInterface
     */
    private $grid_boundary;
    
    /**
     * Grid constructor method.
     *
     * @param ConfigControllerInterface $config_controller
     * @param BoundaryInterface $grid_boundary
     * @param GridViewInterface $grid_view
     */
    public function __construct(ConfigControllerInterface $config_controller, BoundaryInterface $grid_boundary, GridViewInterface $grid_view)
    {
        $this->setConfigController($config_controller);
        $this->setGridView($grid_view);
        $this->setGridBoundary($grid_boundary);
    }
    
    /**
     * Insert empty points into the grid.
     */
    public function insertEmptyPoints(): void
    {
        $config = $this->getConfigController();
        $grid_view = $this->getGridView();
        $x_width = $grid_view->getXWidth();
        $y_width = $grid_view->getYWidth();
        $lowest_x = $grid_view->getLowestX();
        $lowest_y = $grid_view->getLowestY() - 1; # todo not have to subtract 1 from the Y axis.
        $total = $x_width * $y_width;
        $normal_icon = $config->getWorldPointNormalIcon();
        $alternate_icon = $config->getWorldPointAlternateIcon();
        $y_grid_index = 1;
        
        for ($i = 0; $i <= $total; $i++) {
            if ($i % $x_width === 0) {
                $y_grid_index++;
        
                $lowest_x = $grid_view->getLowestX();
                $lowest_y++;
            }
            
            if ($y_grid_index % 2 === 0) {
                $this->insertWithIndex(
                    WorldPointFactory::newEmpty(
                        $alternate_icon,
                        CoordinatesFactory::new($lowest_x, $lowest_y)),
                    $i
                );
            } else {
                $this->insertWithIndex(
                    WorldPointFactory::newEmpty(
                        $normal_icon,
                        CoordinatesFactory::new($lowest_x, $lowest_y)
                    ),
                    $i
                );
            }
    
            $lowest_x++;
        }
        
        $this->setOutOfBoundsPoints();
    }
    
    /**
     * Insert world point into grid using coordinates.
     *
     * @param WorldPointInterface $world_point
     * @param CoordinatesInterface $coordinates
     */
    public function insertWithCoordinates(WorldPointInterface $world_point, CoordinatesInterface $coordinates): void
    {
        $grid_view = $this->getGridView();
        
        if ($grid_view->validateCoordinatesInView($coordinates) === false) {
            return;
        }
    
        $grid_view_center = $grid_view->getCenterCoordinates();
        $point_x = $coordinates->getX() - $grid_view_center->getX() + ($grid_view->getXWidth() / 2);
        $point_y = $coordinates->getY() - $grid_view_center->getY() + ($grid_view->getYWidth() / 2);
        $index = $point_x + $point_y * $grid_view->getXWidth();
        
        $this->grid[$index] = $world_point;
    }
    
    /**
     * Insert world point into grid using index.
     *
     * @param WorldPointInterface $world_point
     * @param int $index
     */
    protected function insertWithIndex(WorldPointInterface $world_point, int $index): void
    {
        $this->grid[$index] = $world_point;
    }
    
    /**
     * Set any world points that are out of bounds to the out of bounds display icon.
     */
    protected function setOutOfBoundsPoints(): void
    {
        $boundary = $this->getGridBoundary();
        $oob_icon = $this->getConfigController()->getWorldPointOutOfBoundsIcon();
        
        foreach ($this->getGrid() as $world_point) {
            if ($boundary->validateCoordinatesInBounds($world_point->getCoordinates()) === false) {
                continue;
            }
    
            $world_point->setIcon($oob_icon);
        }
    }
    
    /**
     * Returns config_controller.
     *
     * @return ConfigControllerInterface
     */
    protected function getConfigController(): ConfigControllerInterface
    {
        return $this->config_controller;
    }
    
    /**
     * Sets config_controller.
     *
     * @param ConfigControllerInterface $config_controller
     */
    protected function setConfigController(ConfigControllerInterface $config_controller): void
    {
        $this->config_controller = $config_controller;
    }
    
    /**
     * Returns grid_index.
     *
     * @return int
     */
    protected function getIndex(): int
    {
        return $this->index;
    }
    
    /**
     * Sets grid_index.
     *
     * @param int $index
     */
    protected function setIndex(int $index): void
    {
        $this->index = $index;
    }
    
    /**
     * Returns grid.
     *
     * @return WorldPointInterface[]
     */
    public function getGrid(): array
    {
        return $this->grid;
    }
    
    /**
     * Wipe grid.
     */
    public function wipeGrid(): void
    {
        $this->grid = [];
        
        reset($this->grid);
    }
    
    /**
     * Returns grid_view.
     *
     * @return GridViewInterface
     */
    public function getGridView(): GridViewInterface
    {
        return $this->grid_view;
    }
    
    /**
     * Sets grid_view.
     *
     * @param GridViewInterface $grid_view
     */
    public function setGridView(GridViewInterface $grid_view): void
    {
        $this->grid_view = $grid_view;
    }
    
    /**
     * Returns the boundaries for the world grid.
     *
     * @return BoundaryInterface
     */
    public function getGridBoundary(): BoundaryInterface
    {
        return $this->grid_boundary;
    }
    
    /**
     * Sets boundary.
     *
     * @param BoundaryInterface $grid_boundary
     */
    public function setGridBoundary(BoundaryInterface $grid_boundary): void
    {
        $this->grid_boundary = $grid_boundary;
    }
}
