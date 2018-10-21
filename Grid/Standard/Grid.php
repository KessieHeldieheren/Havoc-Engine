<?php
declare(strict_types=1);

namespace Havoc\Engine\Grid\Standard;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\Grid\Boundary\BoundaryFactory;
use Havoc\Engine\Grid\Boundary\BoundaryInterface;
use Havoc\Engine\WorldPoint\WorldPointFactory;
use Havoc\Engine\WorldPoint\WorldPointInterface;

/**
 * Havoc Engine grid.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class Grid implements GridInterface
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
     * Grid constructor method.
     *
     * @param ConfigControllerInterface $config_controller
     */
    public function __construct(ConfigControllerInterface $config_controller)
    {
        $this->setConfigController($config_controller);
    }
    
    /**
     * Returns the boundaries for the world grid.
     *
     * @return BoundaryInterface
     */
    public function getBoundary(): BoundaryInterface
    {
        $config = $this->getConfigController();
        
        return BoundaryFactory::new(
            1,
            $config->getXGrid(),
            1,
            $config->getYGrid()
        );
    }
    
    /**
     * Insert empty points into the grid.
     */
    public function insertEmptyPoints(): void
    {
        $config = $this->getConfigController();
        $x_grid = $config->getXGrid();
        $y_grid = $config->getYGrid();
        $total = $x_grid * $y_grid;
        $normal_icon = $config->getWorldPointNormalIcon();
        $alternate_icon = $config->getWorldPointAlternateIcon();
        $y_grid_index = 1;
        
        for ($i = 0; $i <= $total; $i++) {
            if (0 === $i % $x_grid) {
                $y_grid_index++;
            }
            
            if (0 === $y_grid_index % 2) {
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
        $point_x = $coordinates->getX();
        $point_y = $coordinates->getY();
        $index = ($point_x - 1) + ($point_y - 1) * $this->getConfigController()->getXGrid();
        
        $this->grid[$index] = $world_point;
    }
    
    /**
     * Insert world point into grid using index.
     *
     * @param WorldPointInterface $world_point
     * @param int $index
     */
    public function insertWithIndex(WorldPointInterface $world_point, int $index): void
    {
        $this->grid[$index] = $world_point;
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
     * Returns grid_index.
     *
     * @return int
     */
    public function getIndex(): int
    {
        return $this->index;
    }
    
    /**
     * Sets grid_index.
     *
     * @param int $index
     */
    public function setIndex(int $index): void
    {
        $this->index = $index;
    }
}
