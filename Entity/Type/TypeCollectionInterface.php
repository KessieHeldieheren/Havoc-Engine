<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Type;

/**
 * Havoc Core entity type collection interface.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
interface TypeCollectionInterface
{
    /**
     * Returns types.
     *
     * @return TypeInterface[]
     */
    public function getTypes(): array;
    
    /**
     * Returns true if collection has a given type.
     *
     * @param TypeInterface $type
     * @return bool
     */
    public function hasType(TypeInterface $type): bool;
    
    /**
     * Adds a type to the collection.
     *
     * @param TypeInterface $type
     */
    public function addType(TypeInterface $type): void;
    
    /**
     * Silently delete a provided type.
     *
     * @param TypeInterface $type
     */
    public function deleteType(TypeInterface $type): void;
    
    /**
     * Adds multiple types to the collection.
     *
     * @param array $types
     */
    public function addTypes(array $types): void;
}
