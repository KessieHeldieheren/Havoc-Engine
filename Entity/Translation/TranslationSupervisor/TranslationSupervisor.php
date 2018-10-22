<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation\TranslationSupervisor;

use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\Entity\EntitySupervisor\EntitySupervisorInterface;
use Havoc\Engine\Entity\EntityInterface;
use Havoc\Engine\Grid\Standard\GridSupervisorInterface;
use Havoc\Engine\Logger\LogController\LogControllerInterface;

/**
 * Havoc Engine entity translation controller.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class TranslationSupervisor implements TranslationSupervisorInterface
{
    public const LOG_TELEPORTED_ENTITY = "%s (#%s) was teleported to %s.";
    
    /**
     * Entity supervisor.
     *
     * @var EntitySupervisorInterface
     */
    private $entity_supervisor;
    
    /**
     * Log controller.
     *
     * @var \Havoc\Engine\Logger\LogController\LogControllerInterface
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
        $this->setEntitySupervisor($entity_collection);
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
            self::LOG_TELEPORTED_ENTITY,
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
        $entities = $this->getEntitySupervisor()->getEntityCollection()->getEntities();
        
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
    public function getEntitySupervisor(): EntitySupervisorInterface
    {
        return $this->entity_supervisor;
    }
    
    /**
     * Sets entity_collection.
     *
     * @param EntitySupervisorInterface $entity_supervisor
     */
    public function setEntitySupervisor(EntitySupervisorInterface $entity_supervisor): void
    {
        $this->entity_supervisor = $entity_supervisor;
    }
    
    /**
     * Returns log_controller.
     *
     * @return \Havoc\Engine\Logger\LogController\LogControllerInterface
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
