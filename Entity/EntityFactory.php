<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity;

use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\Logger\LogControllerInterface;
use Havoc\Engine\WorldPoint\WorldPointInterface;
use ReflectionClass;

/**
 * Havoc Core entity factory.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
abstract class EntityFactory
{
    /**
     * Create a new entity.
     *
     * @param string $entity_class
     * @param int $id
     * @param string $name
     * @param CoordinatesInterface $coordinates
     * @param string $icon
     * @return EntityInterface
     * @throws \ReflectionException
     */
    public static function newEntity(string $entity_class = Entity::class, int $id, string $name, CoordinatesInterface $coordinates, string $icon): EntityInterface
    {
        $reflection_interfaces = (new ReflectionClass($entity_class))->getInterfaceNames();
        
        if (false === \in_array(EntityInterface::class, $reflection_interfaces, true)) {
            throw EntityException::entityBadClass($entity_class);
        }
        
        if (false === \in_array(WorldPointInterface::class, $reflection_interfaces, true)) {
            throw EntityException::entityBadClass($entity_class);
        }
        
        return new $entity_class($id, $name, $coordinates, $icon);
    }
    
    /**
     * Create a new entity supervisor.
     *
     * @param LogControllerInterface $log_controller
     * @param string $supervisor
     * @return EntitySupervisorInterface
     * @throws \ReflectionException
     */
    public static function newEntitySupervisor(LogControllerInterface $log_controller, string $supervisor = EntitySupervisor::class): EntitySupervisorInterface
    {
        $reflects = (new ReflectionClass($supervisor))
            ->implementsInterface(EntitySupervisorInterface::class);
        
        if (false === $reflects) {
            throw EntityException::entityCollectionBadClass($supervisor);
        }
        
        return new $supervisor($log_controller);
    }
}
