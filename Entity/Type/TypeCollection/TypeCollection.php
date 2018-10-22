<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Type\TypeCollection;

use Havoc\Engine\Entity\Type\TypeInterface;

/**
 * Havoc Engine entity type collection.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class TypeCollection implements TypeCollectionInterface
{
    /**
     * BoundaryViolationCollection of types.
     *
     * @var TypeInterface[]
     */
    private $types = [];
    
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
     * Returns true if collection has a given type.
     *
     * @param TypeInterface $type
     * @return bool
     */
    public function hasType(TypeInterface $type): bool
    {
        return array_key_exists($type->getName(), $this->types);
    }
    
    /**
     * Adds multiple types to the collection.
     *
     * @param array $types
     */
    public function addTypes(array $types): void
    {
        foreach ($types as $type) {
            $this->addType($type);
        }
    }
    
    /**
     * Adds a type to the collection.
     *
     * @param TypeInterface $type
     */
    public function addType(TypeInterface $type): void
    {
        $this->types[$type->getName()] = $type;
    }
    
    /**
     * Silently delete a provided type.
     *
     * @param TypeInterface $type
     */
    public function deleteType(TypeInterface $type): void
    {
        if (!array_key_exists($type->getName(), $this->types)) {
            return;
        }
        
        unset ($this->types[$type->getName()]);
    }
}
