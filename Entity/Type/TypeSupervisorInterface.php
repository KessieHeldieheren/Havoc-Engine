<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Type;

use Havoc\Engine\Entity\EntitySupervisorInterface;
use Havoc\Engine\Entity\EntityInterface;

/**
 * Havoc Engine entity type controller interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface TypeSupervisorInterface
{
    
    /**
     * TypeController constructor method.
     *
     * @param EntitySupervisorInterface $entity_collection
     */
    public function __construct(EntitySupervisorInterface $entity_collection);
    
    /**
     * Create a new type.
     *
     * @param string $name
     * @param string $type_class
     * @return TypeInterface
     * @throws \ReflectionException
     */
    public function createType(string $name, string $type_class = Type::class): TypeInterface;
    
    /**
     * Create type and assign to entity.
     *
     * @param EntityInterface $entity
     * @param TypeInterface $type
     */
    public function addTypeToEntity(EntityInterface $entity, TypeInterface $type): void;
    
    /**
     * Returns types.
     *
     * @return TypeInterface[]
     */
    public function getTypes(): array;
    
    /**
     * Sets types.
     *
     * @param TypeInterface[] $types
     */
    public function setTypes(array $types): void;
    
    /**
     * Returns all entities by a given type.
     *
     * @param TypeInterface $type
     * @return EntityInterface[]
     */
    public function getEntitiesByType(TypeInterface $type): array;
}
