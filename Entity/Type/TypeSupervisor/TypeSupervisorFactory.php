<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Type\TypeSupervisor;

use Havoc\Engine\Entity\EntitySupervisor\EntitySupervisorInterface;
use Havoc\Engine\Entity\Type\TypeException;
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
        
        if ($reflects === false) {
            throw TypeException::typeSupervisorBadClass($supervisor);
        }
        
        return new $supervisor($entity_collection);
    }
}
