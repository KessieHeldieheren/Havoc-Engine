<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Type;

use Havoc\Engine\Entity\EntitySupervisorInterface;
use ReflectionClass;

/**
 * Havoc Engine entity type controller factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class TypeSupervisorFactory
{
    /**
     * Create a new entity type controller.
     *
     * @param EntitySupervisorInterface $entity_collection
     * @param string $supervisor
     * @return TypeSupervisorInterface
     * @throws \ReflectionException
     */
    public static function new(EntitySupervisorInterface $entity_collection, string $supervisor = TypeSupervisor::class): TypeSupervisorInterface
    {
        $reflects = (new ReflectionClass($supervisor))
            ->implementsInterface(TypeSupervisorInterface::class);
        
        if (false === $reflects) {
            throw TypeException::typeControllerBadClass($supervisor);
        }
        
        return new $supervisor($entity_collection);
    }
}
