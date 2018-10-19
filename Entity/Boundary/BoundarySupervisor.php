<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary;

use Havoc\Engine\Entity\EntitySupervisorInterface;
use Havoc\Engine\Entity\EntityInterface;
use Havoc\Engine\Grid\Boundary\BoundaryInterface;
use Havoc\Engine\Logger\LogControllerInterface;

/**
 * Havoc Core entity boundary supervisor.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class BoundarySupervisor implements BoundarySupervisorInterface
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
     * World grid boundary.
     *
     * @var BoundaryInterface
     */
    private $boundary;
    
    /**
     * BoundarySupervisor constructor method.
     *
     * @param EntitySupervisorInterface $entity_collection
     * @param LogControllerInterface $log_controller
     * @param BoundaryInterface $boundary
     */
    public function __construct(EntitySupervisorInterface $entity_collection, LogControllerInterface $log_controller, BoundaryInterface $boundary)
    {
        $this->setEntityCollection($entity_collection);
        $this->setLogController($log_controller);
        $this->setBoundary($boundary);
    }
    
    /**
     * Validate that all entities are in bounds.
     */
    public function validateEntitiesInBoundary(): void
    {
        $entities = $this->getEntityCollection()->getEntities();
        
        foreach ($entities as $entity) {
            $this->validateEntityInBoundary($entity);
        }
    }
    
    protected function validateEntityInBoundary(EntityInterface $entity): void
    {
        [$x, $y] = $entity->getCoordinates()->array();
        $boundary = $this->getBoundary();
        
        if ($x < $boundary->getXNegative()) {
        
        }
    }
    
    protected function rectifyOutOfBounds(EntityInterface $entity): void
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
     * Returns boundary.
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
}
