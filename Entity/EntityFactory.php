<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity;

use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\WorldPoint\WorldPointInterface;
use ReflectionClass;

/**
 * Havoc Engine entity factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
abstract class EntityFactory
{
    /**
     * @param string $entity_class
     * @param int $id
     * @param string $name
     * @param CoordinatesInterface $coordinates
     * @param string $icon
     * @return EntityInterface
     * @throws \ReflectionException
     */
    public static function new(string $entity_class = EntityBase::class, int $id, string $name, CoordinatesInterface $coordinates, string $icon): EntityInterface
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
}
