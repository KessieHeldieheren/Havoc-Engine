<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation;

use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\Entity\EntityCollectionInterface;
use Havoc\Engine\Entity\EntityInterface;
use Havoc\Engine\Grid\GridInterface;
use Havoc\Engine\Logger\LogControllerInterface;

/**
 * Havoc Engine entity translation controller.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class TranslationController implements TranslationControllerInterface
{
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
     * World grid.
     *
     * @var GridInterface
     */
    private $grid;
    
    /**
     * TranslationController constructor method.
     *
     * @param EntityCollectionInterface $entity_collection
     * @param LogControllerInterface $log_controller
     * @param GridInterface $grid
     */
    public function __construct(EntityCollectionInterface $entity_collection, LogControllerInterface $log_controller, GridInterface $grid)
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
}
