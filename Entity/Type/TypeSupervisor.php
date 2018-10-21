<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Type;

use Havoc\Engine\Entity\EntitySupervisorInterface;
use Havoc\Engine\Entity\EntityInterface;

/**
 * Havoc Engine entity type controller.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class TypeSupervisor implements TypeSupervisorInterface
{
    /**
     * Entity types list.
     *
     * @var TypeInterface[]
     */
    private $types = [];
    
    /**
     * Entity collection.
     *
     * @var EntitySupervisorInterface
     */
    private $entity_collection;
    
    /**
     * TypeController constructor method.
     *
     * @param EntitySupervisorInterface $entity_collection
     */
    public function __construct(EntitySupervisorInterface $entity_collection)
    {
        $this->setEntityCollection($entity_collection);
    }
    
    /**
     * Create a new type.
     *
     * @param string $name
     * @param string $type_class
     * @return TypeInterface
     * @throws \ReflectionException
     */
    public function createType(string $name, string $type_class = Type::class): TypeInterface
    {
        $id = $this->getNewKey();
        $type = TypeFactory::newType($id, $name, $type_class);
        $this->types[$id] = $type;
        
        return $type;
    }
    
    /**
     * Create type and assign to entity.
     *
     * @param EntityInterface $entity
     * @param TypeInterface $type
     */
    public function addTypeToEntity(EntityInterface $entity, TypeInterface $type): void
    {
        $entity->getTypeCollection()->addType($type);
    }
    
    /**
     * Returns all entities by a given type.
     *
     * @param TypeInterface $type
     * @return EntityInterface[]
     */
    public function getEntitiesByType(TypeInterface $type): array
    {
        $entities = $this->getEntityCollection()->getEntitycollection();
        $result = [];
        
        foreach ($entities as $entity) {
            if (true === $entity->getTypeCollection()->hasType($type)) {
                $result[] = $entity;
            }
        }
        
        return $result;
    }
    
    /**
     * Returns types.
     *
     * @return TypeInterface[]
     */
    public function getTypes(): array
    {
        return $this->types;
    }
    
    /**
     * Sets types.
     *
     * @param TypeInterface[] $types
     */
    public function setTypes(array $types): void
    {
        $this->types = $types;
    }
    
    /**
     * Returns entity_collection.
     *
     * @return EntitySupervisorInterface
     */
    public function getEntityCollection(): EntitySupervisorInterface
    {
        return $this->entity_collection;
    }
    
    /**
     * Sets entity_collection.
     *
     * @param EntitySupervisorInterface $entity_collection
     */
    public function setEntityCollection(EntitySupervisorInterface $entity_collection): void
    {
        $this->entity_collection = $entity_collection;
    }
    
    /**
     * Returns the last key plus 1.
     *
     * @return int
     */
    protected function getNewKey(): int
    {
        end($this->types);
        
        $key = (int) key($this->types) + 1;
        
        reset($this->types);
        
        return $key;
    }
}
