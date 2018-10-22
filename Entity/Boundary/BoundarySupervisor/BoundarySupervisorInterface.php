<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary\BoundarySupervisor;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Entity\Boundary\BoundaryViolation\BoundaryViolationCollection\BoundaryViolationCollectionInterface;
use Havoc\Engine\Entity\EntitySupervisor\EntitySupervisorInterface;
use Havoc\Engine\Entity\Boundary\BoundaryInterface;
use Havoc\Engine\Logger\LogController\LogControllerInterface;

/**
 * Havoc Engine entity boundary supervisor interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface BoundarySupervisorInterface
{
    /**
     * BoundarySupervisor constructor method.
     *
     * @param \Havoc\Engine\Entity\EntitySupervisor\EntitySupervisorInterface $entity_collection
     * @param \Havoc\Engine\Logger\LogController\LogControllerInterface $log_controller
     * @param \Havoc\Engine\Entity\Boundary\BoundaryInterface $boundary
     * @param ConfigControllerInterface $config_controller
     */
    public function __construct(EntitySupervisorInterface $entity_collection, LogControllerInterface $log_controller, BoundaryInterface $boundary, ConfigControllerInterface $config_controller);
    
    /**
     * Validate that all entities are in bounds.
     */
    public function validateEntitiesInBounds(): void;
    
    /**
     * Returns entity_out_of_bounds_collection.
     *
     * @return \Havoc\Engine\Entity\Boundary\BoundaryViolation\BoundaryViolationCollection\BoundaryViolationCollectionInterface
     */
    public function getBoundaryViolations(): BoundaryViolationCollectionInterface;
}
