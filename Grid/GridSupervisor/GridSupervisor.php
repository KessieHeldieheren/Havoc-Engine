<?php
declare(strict_types=1);

namespace Havoc\Engine\Grid\GridSupervisor;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\Entity\Boundary\BoundaryInterface;
use Havoc\Engine\Grid\GridView\GridViewFactory;
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
    private $boundary;
    
    /**
     * Grid constructor method.
     *
     * @param ConfigControllerInterface $config_controller
     * @param BoundaryInterface $boundary
     */
    public function __construct(ConfigControllerInterface $config_controller, BoundaryInterface $boundary)
    {
        $this->setConfigController($config_controller);
        $this->setBoundary($boundary);
        $this->bootstrap();
    }
    
    /**
     * Bootstrap module.
     */
    protected function bootstrap(): void
    {
        $this->setGridView(GridViewFactory::new($this->getConfigController()));
    }
    
    /**
     * Returns the boundaries for the world grid.
     *
     * @return BoundaryInterface
     */
    public function getBoundary(): BoundaryInterface
    {
        return $this->boundary;
    }
    
    /**
     * Sets boundary.
     *
     * @param BoundaryInterface $boundary
     */
    public function setBoundary(BoundaryInterface $boundary): void
    {
        $this->boundary = $boundary;
    }
    
    /**
     * Insert empty points into the grid.
     */
    public function insertEmptyPoints(): void
    {
        $config = $this->getConfigController();
        $x_grid = $config->getXView();
        $y_grid = $config->getYView();
        $total = $x_grid * $y_grid;
        $normal_icon = $config->getWorldPointNormalIcon();
        $alternate_icon = $config->getWorldPointAlternateIcon();
        $y_grid_index = 1;
        
        for ($i = 0; $i <= $total; $i++) {
            if ($i % $x_grid === 0) {
                $y_grid_index++;
            }
            
            if ($y_grid_index % 2 === 0) {
                $this->insertWithIndex(
                    WorldPointFactory::newEmpty($alternate_icon),
                    $i
                );
                
                continue;
            }
    
            $this->insertWithIndex(
                WorldPointFactory::newEmpty($normal_icon),
                $i
            );
        }
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
     * Insert world point into grid using coordinates.
     *
     * @param WorldPointInterface $world_point
     * @param CoordinatesInterface $coordinates
     */
    public function insertWithCoordinates(WorldPointInterface $world_point, CoordinatesInterface $coordinates): void
    {
        if ($this->validateCoordinatesInView($coordinates) === false) {
            return;
        }
        
        $grid_view = $this->getGridView();
        $point_x = $coordinates->getX() + $grid_view->getPositiveXView();
        $point_y = $coordinates->getY() + $grid_view->getPositiveYView();
        $index = ($point_x - 1) + ($point_y - 1) * $this->getConfigController()->getXView();
        
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
     * Validate that any given coordinates are in the grid view.
     *
     * @param CoordinatesInterface $coordinates
     * @return bool
     */
    protected function validateCoordinatesInView(CoordinatesInterface $coordinates): bool
    {
        $grid_view = $this->getGridView();
        [$x, $y] = $coordinates->array();
    
        if ($x < $grid_view->getNegativeXView()) {
            return false;
        }
    
        if ($x > $grid_view->getPositiveXView()) {
            return false;
        }
    
        if ($y < $grid_view->getNegativeYView()) {
            return false;
        }
    
        if ($y > $grid_view->getPositiveYView()) {
            return false;
        }
        
        return true;
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
}
