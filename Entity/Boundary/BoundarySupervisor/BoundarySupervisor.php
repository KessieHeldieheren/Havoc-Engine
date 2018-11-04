<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary\BoundarySupervisor;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Entity\Boundary\BoundaryCode\BoundaryCode;
use Havoc\Engine\Entity\Boundary\BoundaryRules\BoundaryRule;
use Havoc\Engine\Entity\Boundary\BoundaryViolation\BoundaryViolationCollection\BoundaryViolationCollectionFactory;
use Havoc\Engine\Entity\Boundary\BoundaryViolation\BoundaryViolationCollection\BoundaryViolationCollectionInterface;
use Havoc\Engine\Entity\Boundary\BoundaryRectifier\BoundaryRectifier;
use Havoc\Engine\Entity\Boundary\BoundaryRectifier\BoundaryRectifierFactory;
use Havoc\Engine\Entity\Boundary\BoundaryRectifier\BoundaryRectifierInterface;
use Havoc\Engine\Entity\EntitySupervisor\EntitySupervisorInterface;
use Havoc\Engine\Entity\EntityInterface;
use Havoc\Engine\Entity\Boundary\BoundaryInterface;
use Havoc\Engine\Logger\LogController\LogControllerInterface;

/**
 * Havoc Engine entity boundary supervisor.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class BoundarySupervisor implements BoundarySupervisorInterface
{
    public const LOG_ENTITY_FELL_OUT_OF_BOUNDS = "%s (#%s) fell out of the %s bound on coordinates %s (altered as %s).";
    
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
    private $boundary_violations;
    
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
    private $grid_boundary;
    
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
     * @param BoundaryInterface $grid_boundary
     * @param ConfigControllerInterface $config_controller
     */
    public function __construct(EntitySupervisorInterface $entity_collection, LogControllerInterface $log_controller, BoundaryInterface $grid_boundary, ConfigControllerInterface $config_controller)
    {
        $this->setEntitySupervisor($entity_collection);
        $this->setLogController($log_controller);
        $this->setGridBoundary($grid_boundary);
        $this->setConfigController($config_controller);
        $this->setBoundaryViolations(BoundaryViolationCollectionFactory::new());
    }
    
    /**
     * Validate that all entities are in bounds.
     */
    public function rectifyBoundaryViolations(): void
    {
        $this->getBoundaryViolations()->cleanViolations();
        
        $entities = $this->getEntitySupervisor()->getEntityCollection()->getEntities();
        
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
        $boundary = $this->getGridBoundary();
        
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
        $rectifier = $this->createRectifier($entity, $entity->getBoundaryRules()->getXNegative());
        $original_coordinates = $entity->getCoordinates()->clone();
        $boundary_code = BoundaryCode::X_NEGATIVE;
        
        $rectifier->rectifyXNegative();
        $this->getBoundaryViolations()->addViolation($entity, $boundary_code);
        
        $entity->onBoundaryCollision($boundary_code);
        
        $this->getLogController()->addLog(
            [
                $entity->getName(),
                $entity->getId(),
                BoundaryCode::getName($boundary_code),
                $original_coordinates->string(),
                $entity->getCoordinates()->string()
            ],
            self::LOG_ENTITY_FELL_OUT_OF_BOUNDS,
            self::class
        );
    }
    
    /**
     * Rectify an X Positive boundary violation.
     *
     * @param EntityInterface $entity
     * @throws \ReflectionException
     */
    protected function xPositive(EntityInterface $entity): void
    {
        $rectifier = $this->createRectifier($entity, $entity->getBoundaryRules()->getXPositive());
        $original_coordinates = $entity->getCoordinates()->clone();
        $boundary_code = BoundaryCode::X_POSITIVE;
        
        $rectifier->rectifyXPositive();
        $this->getBoundaryViolations()->addViolation($entity, $boundary_code);
    
        $entity->onBoundaryCollision($boundary_code);
        
        $this->getLogController()->addLog(
            [
                $entity->getName(),
                $entity->getId(),
                BoundaryCode::getName($boundary_code),
                $original_coordinates->string(),
                $entity->getCoordinates()->string()
            ],
            self::LOG_ENTITY_FELL_OUT_OF_BOUNDS,
            self::class
        );
    }
    
    /**
     * Rectify a Y Negative boundary violation.
     *
     * @param EntityInterface $entity
     * @throws \ReflectionException
     */
    protected function yNegative(EntityInterface $entity): void
    {
        $rectifier = $this->createRectifier($entity, $entity->getBoundaryRules()->getYNegative());
        $original_coordinates = $entity->getCoordinates()->clone();
        $boundary_code = BoundaryCode::Y_NEGATIVE;
        
        $rectifier->rectifyYNegative();
        $this->getBoundaryViolations()->addViolation($entity, $boundary_code);
    
        $entity->onBoundaryCollision($boundary_code);
        
        $this->getLogController()->addLog(
            [
                $entity->getName(),
                $entity->getId(),
                BoundaryCode::getName($boundary_code),
                $original_coordinates->string(),
                $entity->getCoordinates()->string()
            ],
            self::LOG_ENTITY_FELL_OUT_OF_BOUNDS,
            self::class
        );
    }
    
    /**
     * Rectify a Y Positive boundary violation.
     *
     * @param EntityInterface $entity
     * @throws \ReflectionException
     */
    protected function yPositive(EntityInterface $entity): void
    {
        $rectifier = $this->createRectifier($entity, $entity->getBoundaryRules()->getYPositive());
        $original_coordinates = $entity->getCoordinates()->clone();
        $boundary_code = BoundaryCode::Y_POSITIVE;
        
        $rectifier->rectifyYPositive();
        $this->getBoundaryViolations()->addViolation($entity, $boundary_code);
    
        $entity->onBoundaryCollision($boundary_code);
        
        $this->getLogController()->addLog(
            [
                $entity->getName(),
                $entity->getId(),
                BoundaryCode::getName($boundary_code),
                $original_coordinates->string(),
                $entity->getCoordinates()->string()
            ],
            self::LOG_ENTITY_FELL_OUT_OF_BOUNDS,
            self::class
        );
    }
    
    /**
     * Creates and returns a rectifier based on the entity's parameters.
     *
     * @param EntityInterface $entity
     * @param int $boundary_rule
     * @return BoundaryRectifierInterface
     * @throws \ReflectionException
     */
    protected function createRectifier(EntityInterface $entity, int $boundary_rule): BoundaryRectifierInterface
    {
        $boundary_rule_name = BoundaryRule::getName($boundary_rule);
        
        return BoundaryRectifierFactory::new(
            $entity,
            $this->getGridBoundary(),
            BoundaryRectifier::getValue($boundary_rule_name)
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
    public function getBoundaryViolations(): BoundaryViolationCollectionInterface
    {
        return $this->boundary_violations;
    }
    
    /**
     * Sets boundary_violators.
     *
     * @param BoundaryViolationCollectionInterface $boundary_violations
     */
    public function setBoundaryViolations(BoundaryViolationCollectionInterface $boundary_violations): void
    {
        $this->boundary_violations = $boundary_violations;
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
    public function getGridBoundary(): BoundaryInterface
    {
        return $this->grid_boundary;
    }
    
    /**
     * Sets boundary.
     *
     * @param BoundaryInterface $grid_boundary
     */
    public function setGridBoundary(BoundaryInterface $grid_boundary): void
    {
        $this->grid_boundary = $grid_boundary;
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
