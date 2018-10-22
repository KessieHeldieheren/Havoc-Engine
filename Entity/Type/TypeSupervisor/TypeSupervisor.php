<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Type\TypeSupervisor;

use Havoc\Engine\Entity\EntitySupervisor\EntitySupervisorInterface;
use Havoc\Engine\Entity\EntityInterface;
use Havoc\Engine\Entity\Type\Type;
use Havoc\Engine\Entity\Type\TypeFactory;
use Havoc\Engine\Entity\Type\TypeInterface;

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
     * Entity supervisor.
     *
     * @var \Havoc\Engine\Entity\EntitySupervisor\EntitySupervisorInterface
     */
    private $entity_supervisor;
    
    /**
     * TypeController constructor method.
     *
     * @param \Havoc\Engine\Entity\EntitySupervisor\EntitySupervisorInterface $entity_collection
     */
    public function __construct(EntitySupervisorInterface $entity_collection)
    {
        $this->setEntitySupervisor($entity_collection);
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
        $type = TypeFactory::new($id, $name, $type_class);
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
        $entities = $this->getEntitySupervisor()->getEntityCollection()->getEntities();
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
     * @return \Havoc\Engine\Entity\EntitySupervisor\EntitySupervisorInterface
     */
    public function getEntitySupervisor(): EntitySupervisorInterface
    {
        return $this->entity_supervisor;
    }
    
    /**
     * Sets entity_collection.
     *
     * @param \Havoc\Engine\Entity\EntitySupervisor\EntitySupervisorInterface $entity_supervisor
     */
    public function setEntitySupervisor(EntitySupervisorInterface $entity_supervisor): void
    {
        $this->entity_supervisor = $entity_supervisor;
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
