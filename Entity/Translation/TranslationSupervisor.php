<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation;

use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\Entity\EntitySupervisorInterface;
use Havoc\Engine\Entity\EntityInterface;
use Havoc\Engine\Grid\Standard\GridSupervisorInterface;
use Havoc\Engine\Logger\LogControllerInterface;

/**
 * Havoc Core entity translation controller.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class TranslationSupervisor implements TranslationSupervisorInterface
{
    /**
     * Entity collection.
     *
     * @var EntitySupervisorInterface
     */
    private $entity_collection;
    
    /**
     * Log controller.
     *
     * @var LogControllerInterface
     */
    private $log_controller;
    
    /**
     * World grid.
     *
     * @var GridSupervisorInterface
     */
    private $grid;
    
    /**
     * TranslationSupervisor constructor method.
     *
     * @param EntitySupervisorInterface $entity_collection
     * @param LogControllerInterface $log_controller
     * @param GridSupervisorInterface $grid
     */
    public function __construct(EntitySupervisorInterface $entity_collection, LogControllerInterface $log_controller, GridSupervisorInterface $grid)
    {
        $this->setEntityCollection($entity_collection);
        $this->setLogController($log_controller);
        $this->setGrid($grid);
    }
    
    /**
     * Teleport an entity to a set of coordinates.
     *
     * @param EntityInterface $entity
     * @param CoordinatesInterface $coordinates
     */
    public function teleportToCoordinates(EntityInterface $entity, CoordinatesInterface $coordinates): void
    {
        $entity->setCoordinates($coordinates);
        
        $this->getLogController()->addLog(
            [
                $entity->getName(),
                $entity->getId(),
                $entity->getCoordinates()->string()
            ],
            LogMessage::TELEPORTED_ENTITY,
            self::class
        );
        
        $this->detectEntityCollisions($entity);
    }
    
    /**
     * Detect a collision with an entity.
     *
     * @param EntityInterface $entity
     */
    protected function detectEntityCollisions(EntityInterface $entity): void
    {
        $coordinates = $entity->getCoordinates()->rounded();
        $entities = $this->getEntityCollection()->getEntities();
        
        unset ($entities[$entity->getId()]);
        
        foreach ($entities as $target_entity) {
            if ($coordinates->array() === $target_entity->getCoordinates()->rounded()->array()) {
                $this->getLogController()->addLog(
                    [
                        $entity->getName(),
                        $entity->getId(),
                        $target_entity->getName(),
                        $target_entity->getId(),
                        $coordinates->string()
                    ],
                "%s (#%s) collided with %s (#%s) at %s.",
                self::class
                );
            }
        }
    }
    
    
    protected function detectCollisions(): void
    {
    
    }
    
    /**
     * Returns entity_collection.
     *
     * @return EntitySupervisorInterface
     */
    public function getEntityCollection(): EntitySupervisorInterface
    {
        return $this->entity_collection;
    }
    
    /**
     * Sets entity_collection.
     *
     * @param EntitySupervisorInterface $entity_collection
     */
    public function setEntityCollection(EntitySupervisorInterface $entity_collection): void
    {
        $this->entity_collection = $entity_collection;
    }
    
    /**
     * Returns log_controller.
     *
     * @return LogControllerInterface
     */
    public function getLogController(): LogControllerInterface
    {
        return $this->log_controller;
    }
    
    /**
     * Sets log_controller.
     *
     * @param LogControllerInterface $log_controller
     */
    public function setLogController(LogControllerInterface $log_controller): void
    {
        $this->log_controller = $log_controller;
    }
    
    /**
     * Returns grid.
     *
     * @return GridSupervisorInterface
     */
    public function getGrid(): GridSupervisorInterface
    {
        return $this->grid;
    }
    
    /**
     * Sets grid.
     *
     * @param GridSupervisorInterface $grid
     */
    public function setGrid(GridSupervisorInterface $grid): void
    {
        $this->grid = $grid;
    }
}
