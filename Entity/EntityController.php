<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Entity\Type\TypeController;
use Havoc\Engine\Entity\Type\TypeControllerFactory;
use Havoc\Engine\Entity\Type\TypeControllerInterface;
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
     * Entity collection.
     *
     * @var EntityCollectionInterface
     */
    private $entity_collection;
    
    /**
     * Log controller.
     *
     * @var LogControllerInterface
     */
    private $log_controller;
    
    /**
     * Entity type controller.
     *
     * @var TypeControllerInterface
     */
    private $type_controller;
    
    /**
     * EntityController constructor method.
     *
     * @param ConfigControllerInterface $config_controller
     * @param GridInterface $grid
     * @param LogControllerInterface $logger
     * @param string $type_controller
     * @param string $entity_collection
     */
    public function __construct(ConfigControllerInterface $config_controller, GridInterface $grid, LogControllerInterface $logger, string $type_controller = TypeController::class, string $entity_collection = EntityCollection::class)
    {
        $this->setConfigController($config_controller);
        $this->setGrid($grid);
        $this->setLogcontroller($logger);
        $this->setEntityCollection(EntityFactory::newEntityCollection($this->getLogcontroller(), $entity_collection));
        $this->setTypeController(TypeControllerFactory::new($type_controller, $this->getEntityCollection()));
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
     * Maps all entities onto the grid.
     */
    public function mapEntitiesToGrid(): void
    {
        $grid = $this->getGrid();
        
        foreach ($this->getEntityCollection()->getEntities() as $entity) {
            $grid->insertWithCoordinates($entity, $entity->getCoordinates());
        }
    }
    
    /**
     * Returns entity_collection.
     *
     * @return EntityCollectionInterface
     */
    public function getEntityCollection(): EntityCollectionInterface
    {
        return $this->entity_collection;
    }
    
    /**
     * Sets entity_collection.
     *
     * @param EntityCollectionInterface $entity_collection
     */
    public function setEntityCollection(EntityCollectionInterface $entity_collection): void
    {
        $this->entity_collection = $entity_collection;
    }
    
    /**
     * Returns logger.
     *
     * @return LogControllerInterface
     */
    public function getLogcontroller(): LogControllerInterface
    {
        return $this->log_controller;
    }
    
    /**
     * Sets logger.
     *
     * @param LogControllerInterface $log_controller
     */
    public function setLogcontroller(LogControllerInterface $log_controller): void
    {
        $this->log_controller = $log_controller;
    }
    
    /**
     * Returns type_controller.
     *
     * @return TypeControllerInterface
     */
    public function getTypeController(): TypeControllerInterface
    {
        return $this->type_controller;
    }
    
    /**
     * Sets type_controller.
     *
     * @param TypeControllerInterface $type_controller
     */
    public function setTypeController(TypeControllerInterface $type_controller): void
    {
        $this->type_controller = $type_controller;
    }
}
