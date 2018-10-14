<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\Grid\GridInterface;
use Havoc\Engine\Logger\LogControllerInterface;

/**
 * Havoc Engine entity controller.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class EntityController implements EntityControllerInterface
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
     * World entities.
     *
     * @var EntityInterface[]
     */
    private $entities = [];
    
    /**
     * Logger.
     *
     * @var LogControllerInterface
     */
    private $logger;
    
    /**
     * EntityController constructor method.
     *
     * @param ConfigControllerInterface $config_controller
     * @param GridInterface $grid
     */
    public function __construct(ConfigControllerInterface $config_controller, GridInterface $grid, LogControllerInterface $logger)
    {
        $this->setConfigController($config_controller);
        $this->setGrid($grid);
        $this->setLogger($logger);
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
     * Returns entities.
     *
     * @return EntityInterface[]
     */
    public function getEntities(): array
    {
        return $this->entities;
    }
    
    /**
     * @param string $search_class
     * @return EntityInterface[]
     */
    public function getEntitiesOfClass(string $search_class): array
    {
        $entities = $this->getEntities();
        $result = [];
        
        foreach ($entities as $entity) {
            if ($search_class === \get_class($entity)) {
                $result[] = $entity;
            }
        }
        
        return $result;
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
        
        $this->getLogger()->addLog(
            [
                $entity->getId(),
                $entity->getName(),
                $entity->getIcon(),
                $entity->getCoordinates()->__toString()
            ],
            LogMessage::CREATED_ENTITY,
            self::class
        );
        
        return $entity;
    }
    
    /**
     * Attempts to silently delete an entity. No errors occur on failure.
     *
     * @param EntityInterface $entity
     * @throws \ReflectionException
     */
    public function deleteEntity(EntityInterface $entity): void
    {
        unset($this->entities[$entity->getId()]);
        
        $this->getLogger()->addLog(
            [
                $entity->getId(),
                $entity->getName()
            ],
            LogMessage::DELETED_ENTITY,
            self::class
        );
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
     * Returns logger.
     *
     * @return LogControllerInterface
     */
    public function getLogger(): LogControllerInterface
    {
        return $this->logger;
    }
    
    /**
     * Sets logger.
     *
     * @param LogControllerInterface $logger
     */
    public function setLogger(LogControllerInterface $logger): void
    {
        $this->logger = $logger;
    }
    
    /**
     * Returns the last key plus 1.
     *
     * @return int
     */
    protected function getNewKey(): int
    {
        end($this->entities);
        
        $key = (int) key($this->entities) + 1;
        
        reset($this->entities);
        
        return $key;
    }
}
