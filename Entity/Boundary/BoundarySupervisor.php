<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Entity\Boundary\BoundaryCode\BoundaryCode;
use Havoc\Engine\Entity\Boundary\BoundaryViolation\BoundaryViolationCollectionFactory;
use Havoc\Engine\Entity\Boundary\BoundaryViolation\BoundaryViolationCollectionInterface;
use Havoc\Engine\Entity\Boundary\Rectifier\Rectifier;
use Havoc\Engine\Entity\Boundary\Rectifier\RectifierFactory;
use Havoc\Engine\Entity\Boundary\Rectifier\RectifierInterface;
use Havoc\Engine\Entity\EntitySupervisorInterface;
use Havoc\Engine\Entity\EntityInterface;
use Havoc\Engine\Grid\Boundary\BoundaryInterface;
use Havoc\Engine\Logger\LogControllerInterface;

/**
 * Havoc Engine entity boundary supervisor.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class BoundarySupervisor implements BoundarySupervisorInterface
{
    /**
     * Entity supervisor.
     *
     * @var EntitySupervisorInterface
     */
    private $entity_supervisor;
    
    /**
     * Boundary violation collection for entities out of bounds.
     *
     * @var BoundaryViolationCollectionInterface
     */
    private $boundary_violators;
    
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
     * Configuration controller.
     *
     * @var ConfigControllerInterface
     */
    private $config_controller;
    
    /**
     * BoundarySupervisor constructor method.
     *
     * @param EntitySupervisorInterface $entity_collection
     * @param LogControllerInterface $log_controller
     * @param BoundaryInterface $boundary
     * @param ConfigControllerInterface $config_controller
     */
    public function __construct(EntitySupervisorInterface $entity_collection, LogControllerInterface $log_controller, BoundaryInterface $boundary, ConfigControllerInterface $config_controller)
    {
        $this->setEntitySupervisor($entity_collection);
        $this->setLogController($log_controller);
        $this->setBoundary($boundary);
        $this->setConfigController($config_controller);
        $this->setBoundaryViolators(BoundaryViolationCollectionFactory::new());
    }
    
    /**
     * Validate that all entities are in bounds.
     */
    public function validateEntitiesInBounds(): void
    {
        $this->getBoundaryViolators()->cleanViolations();
        
        $entities = $this->getEntitySupervisor()->getEntitycollection()->getEntities();
        
        foreach ($entities as $entity) {
            $this->validateEntityInBounds($entity);
        }
    }
    
    /**
     * Validate that an individual entity is in bounds.
     *
     * @param EntityInterface $entity
     */
    protected function validateEntityInBounds(EntityInterface $entity): void
    {
        [$x, $y] = $entity->getCoordinates()->array();
        $boundary = $this->getBoundary();
        
        if ($x < $boundary->getXNegative()) {
            $this->xNegative($entity);
        } elseif ($x > $boundary->getXPositive()) {
            $this->xPositive($entity);
        }
        
        if ($y < $boundary->getYNegative()) {
            $this->yNegative($entity);
        } elseif ($y > $boundary->getYPositive()) {
            $this->yPositive($entity); 
        }
    }
    
    /**
     * Rectify an X Negative boundary violation.
     *
     * @param EntityInterface $entity
     * @throws \ReflectionException
     */
    protected function xNegative(EntityInterface $entity): void
    {
        $rectifier = $this->createRectifier($entity);
        
        $rectifier->rectifyXNegative();
        $this->getBoundaryViolators()->addViolation($entity, BoundaryCode::X_NEGATIVE);
    }
    
    /**
     * Rectify an X Positive boundary violation.
     *
     * @param EntityInterface $entity
     * @throws \ReflectionException
     */
    protected function xPositive(EntityInterface $entity): void
    {
        $rectifier = $this->createRectifier($entity);
        
        $rectifier->rectifyXPositive();
        $this->getBoundaryViolators()->addViolation($entity, BoundaryCode::X_POSITIVE);
    }
    
    /**
     * Rectify a Y Negative boundary violation.
     *
     * @param EntityInterface $entity
     * @throws \ReflectionException
     */
    protected function yNegative(EntityInterface $entity): void
    {
        $rectifier = $this->createRectifier($entity);
        
        $rectifier->rectifyYNegative();
        $this->getBoundaryViolators()->addViolation($entity, BoundaryCode::Y_NEGATIVE);
    }
    
    /**
     * Rectify a Y Positive boundary violation.
     *
     * @param EntityInterface $entity
     * @throws \ReflectionException
     */
    protected function yPositive(EntityInterface $entity): void
    {
        $rectifier = $this->createRectifier($entity);
        
        $rectifier->rectifyYPositive();
        $this->getBoundaryViolators()->addViolation($entity, BoundaryCode::Y_POSITIVE);
    }
    
    /**
     * Creates and returns a rectifier based on the entity's parameters.
     *
     * @param EntityInterface $entity
     * @return RectifierInterface
     * @throws \ReflectionException
     */
    protected function createRectifier(EntityInterface $entity): RectifierInterface
    {
        $boundary_rule = $entity->getBoundaryRules()->getXNegative();
        $boundary_rule_name = BoundaryRule::getName($boundary_rule);
        
        return RectifierFactory::new(
            $entity,
            $this->getBoundary(),
            Rectifier::getValue($boundary_rule_name)
        );
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
     * Returns boundary_violators.
     *
     * @return BoundaryViolationCollectionInterface
     */
    public function getBoundaryViolators(): BoundaryViolationCollectionInterface
    {
        return $this->boundary_violators;
    }
    
    /**
     * Sets boundary_violators.
     *
     * @param BoundaryViolationCollectionInterface $boundary_violators
     */
    public function setBoundaryViolators(BoundaryViolationCollectionInterface $boundary_violators): void
    {
        $this->boundary_violators = $boundary_violators;
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
}
