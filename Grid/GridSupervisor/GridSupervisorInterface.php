<?php
declare(strict_types=1);

namespace Havoc\Engine\Grid\GridSupervisor;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Coordinates\Cartesian\CartesianCoordinatesInterface;
use Havoc\Engine\Entity\Boundary\BoundaryInterface;
use Havoc\Engine\Grid\GridView\GridViewInterface;
use Havoc\Engine\WorldPoint\WorldPointInterface;

/**
 * Havoc Engine grid supervisor interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface GridSupervisorInterface
{
    /**
     * Grid constructor method.
     *
     * @param ConfigControllerInterface $config_controller
     * @param BoundaryInterface $grid_grid_boundary
     * @param GridViewInterface $grid_view
     */
    public function __construct(ConfigControllerInterface $config_controller, BoundaryInterface $grid_grid_boundary, GridViewInterface $grid_view);
    
    /**
     * Returns grid.
     *
     * @return WorldPointInterface[]
     */
    public function getGrid(): array;
    
    /**
     * Wipe grid.
     */
    public function wipeGrid(): void;
    
    /**
     * Splice world point onto grid.
     *
     * @param WorldPointInterface $world_point
     * @param CartesianCoordinatesInterface $coordinates
     */
    public function insertWithCoordinates(WorldPointInterface $world_point, CartesianCoordinatesInterface $coordinates): void;
    
    /**
     * Insert empty points into the grid.
     */
    public function insertEmptyPoints(): void;
    
    /**
     * Returns the boundaries for the world grid.
     *
     * @return BoundaryInterface
     */
    public function getGridBoundary(): BoundaryInterface;
    
    /**
     * Returns grid_view.
     *
     * @return GridViewInterface
     */
    public function getGridView(): GridViewInterface;
    
    /**
     * Sets grid_view.
     *
     * @param GridViewInterface $grid_view
     */
    public function setGridView(GridViewInterface $grid_view): void;
}
