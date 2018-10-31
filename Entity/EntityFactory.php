<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity;

use Havoc\Engine\Coordinates\Cartesian\CartesianCoordinatesInterface;
use Havoc\Engine\WorldPoint\WorldPointInterface;
use ReflectionClass;

/**
 * Havoc Engine entity factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class EntityFactory
{
    /**
     * Create a new entity.
     *
     * @param string $entity_class
     * @param int $id
     * @param string $name
     * @param \Havoc\Engine\Coordinates\Cartesian\CartesianCoordinatesInterface $coordinates
     * @param string $icon
     * @return EntityInterface
     * @throws \ReflectionException
     */
    public static function newEntity(string $entity_class = Entity::class, int $id, string $name, CartesianCoordinatesInterface $coordinates, string $icon): EntityInterface
    {
        $reflection_interfaces = (new ReflectionClass($entity_class))->getInterfaceNames();
        
        if (\in_array(EntityInterface::class, $reflection_interfaces, true) === false) {
            throw EntityException::entityBadClass($entity_class);
        }
        
        if (\in_array(WorldPointInterface::class, $reflection_interfaces, true) === false) {
            throw EntityException::entityBadClass($entity_class);
        }
        
        return new $entity_class($id, $name, $coordinates, $icon);
    }
}
