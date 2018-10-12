<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\Grid\GridInterface;
use Iterator;

/**
 * Havoc Engine entity controller.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class EntityController implements EntityControllerInterface, Iterator
{
    /**
     * Grid.
     *
     * @var GridInterface
     */
    private $grid;
    
    /**
     * Configuration controller.
     *
     * @var ConfigControllerInterface
     */
    private $config_controller;
    
    /**
     * Current index.
     *
     * @var int
     */
    private $index = 0;
    
    /**
     * World entities.
     *
     * @var EntityInterface[]
     */
    private $entities = [];
    
    /**
     * EntityController constructor method.
     *
     * @param ConfigControllerInterface $config_controller
     * @param GridInterface $grid
     */
    public function __construct(ConfigControllerInterface $config_controller, GridInterface $grid)
    {
        $this->setConfigController($config_controller);
        $this->setGrid($grid);
    }
    
    /**
     * Returns grid.
     *
     * @return GridInterface
     */
    public function getGrid(): GridInterface
    {
        return $this->grid;
    }
    
    /**
     * Sets grid.
     *
     * @param GridInterface $grid
     */
    public function setGrid(GridInterface $grid): void
    {
        $this->grid = $grid;
    }
    
    /**
     * Returns config.
     *
     * @return ConfigControllerInterface
     */
    public function getConfigController(): ConfigControllerInterface
    {
        return $this->config_controller;
    }
    
    /**
     * Sets config.
     *
     * @param ConfigControllerInterface $config_controller
     */
    public function setConfigController(ConfigControllerInterface $config_controller): void
    {
        $this->config_controller = $config_controller;
    }
    
    /**
     * Returns index.
     *
     * @return int
     */
    public function getIndex(): int
    {
        return $this->index;
    }
    
    /**
     * Sets index.
     *
     * @param int $index
     */
    public function setIndex(int $index): void
    {
        $this->index = $index;
    }
    
    /**
     * Returns entities.
     *
     * @return EntityInterface[]
     */
    public function getEntities(): array
    {
        return $this->entities;
    }
    
    /**
     * Create a new entity.
     *
     * @param string $entity_class
     * @param string $name
     * @param CoordinatesInterface $coordinates
     * @param string $icon
     * @return EntityInterface
     */
    public function createEntity(string $entity_class = EntityBase::class, string $name, CoordinatesInterface $coordinates, string $icon): EntityInterface
    {
        $id = $this->getNewKey();
        $entity = EntityFactory::new($entity_class, $id, $name, $coordinates, $icon);
        
        $this->entities[$id] = $entity;
        
        return $entity;
    }
    
    /**
     * Attempts to silently delete an entity. No errors occur on failure.
     *
     * @param int $id
     */
    public function deleteEntity(int $id): void
    {
        if (isset($this->entities[$id])) {
            unset($this->entities[$id]);
        }
    }
    
    /**
     * Maps all entities onto the grid.
     */
    public function mapEntitiesToGrid(): void
    {
        $grid = $this->getGrid();
        
        foreach ($this->getEntities() as $entity) {
            $grid->insertWithCoordinates($entity, $entity->getCoordinates());
        }
    }
    
    /**
     * Return the current element.
     *
     * @link http://php.net/manual/en/iterator.current.php
     * @return EntityInterface
     * @since 5.0.0
     */
    public function current(): EntityInterface
    {
        return $this->getEntities()[$this->getIndex()];
    }
    
    /**
     * Move forward to next element.
     *
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next(): void
    {
        ++$this->index;
    }
    
    /**
     * Return the key of the current element.
     *
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return $this->getIndex();
    }
    
    /**
     * Checks if current position is valid.
     *
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid(): bool
    {
        return isset($this->getGrid()[$this->getIndex()]);
    }
    
    /**
     * Rewind the Iterator to the first element.
     *
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind(): void
    {
        --$this->index;
    }
    
    /**
     * Returns the last key plus 1.
     *
     * @return int
     */
    public function getNewKey(): int
    {
        end($this->entities);
        
        $key = (int) key($this->entities) + 1;
        
        reset($this->entities);
        
        return $key;
    }
}
