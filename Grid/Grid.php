<?php
declare(strict_types=1);

namespace Havoc\Engine\Grid;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\World\WorldPointInterface;
use Iterator;

/**
 * Havoc Engine grid.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class Grid implements Iterator, GridInterface
{
    /**
     * Configuration controller.
     *
     * @var ConfigControllerInterface
     */
    private $config_controller;
    
    /**
     * Grid array.
     *
     * @var WorldPointInterface[]
     */
    private $grid = [];
    
    /**
     * Grid index.
     *
     * @var int
     */
    private $grid_index = 0;
    
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
     * Splice world point onto grid.
     *
     * @param WorldPointInterface $world_point
     * @param CoordinatesInterface $coordinates
     */
    public function spliceGrid(WorldPointInterface $world_point, CoordinatesInterface $coordinates): void
    {
        $point_x = $coordinates->getX();
        $point_y = $coordinates->getY();
        $point_index = ($point_x - 1) + ($point_y - 1) * $this->getConfigController()->getXGrid();
        
        $this->grid_index[$point_index] = $world_point;
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
    public function getGridIndex(): int
    {
        return $this->grid_index;
    }
    
    /**
     * Sets grid_index.
     *
     * @param int $grid_index
     */
    public function setGridIndex(int $grid_index): void
    {
        $this->grid_index = $grid_index;
    }
    
    /**
     * Return the current element
     *
     * @link http://php.net/manual/en/iterator.current.php
     * @return WorldPointInterface
     * @since 5.0.0
     */
    public function current(): WorldPointInterface
    {
        return $this->getGrid()[$this->getGridIndex()];
    }
    
    /**
     * Move forward to next element
     *
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next(): void
    {
        $this->grid_index++;
    }
    
    /**
     * Return the key of the current element
     *
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return $this->getGridIndex();
    }
    
    /**
     * Checks if current position is valid
     *
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid(): bool
    {
        return isset($this->getGrid()[$this->getGridIndex()]);
    }
    
    /**
     * Rewind the Iterator to the first element
     *
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind(): void
    {
        $this->grid_index--;
    }
}
