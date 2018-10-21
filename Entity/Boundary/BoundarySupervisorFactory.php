<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Entity\EntitySupervisorInterface;
use Havoc\Engine\Grid\Boundary\BoundaryInterface;
use Havoc\Engine\Logger\LogControllerInterface;
use ReflectionClass;

/**
 * Havoc Engine entity boundary supervisor factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class BoundarySupervisorFactory
{
    /**
     * Create a new boundary supervisor.
     *
     * @param EntitySupervisorInterface $entity_collection
     * @param LogControllerInterface $log_controller
     * @param BoundaryInterface $boundary
     * @param ConfigControllerInterface $config_controller
     * @param string $boundary_supervisor
     * @return BoundarySupervisorInterface
     * @throws \ReflectionException
     */
    public static function new(EntitySupervisorInterface $entity_collection, LogControllerInterface $log_controller, BoundaryInterface $boundary, ConfigControllerInterface $config_controller, string $boundary_supervisor = BoundarySupervisor::class): BoundarySupervisorInterface
    {
        $reflects = (new ReflectionClass($boundary_supervisor))->implementsInterface(BoundarySupervisorInterface::class);
        
        if (false === $reflects) {
            throw BoundaryException::boundarySupervisorBadClass($boundary_supervisor);
        }
        
        return new $boundary_supervisor($entity_collection, $log_controller, $boundary, $config_controller);
    }
}
