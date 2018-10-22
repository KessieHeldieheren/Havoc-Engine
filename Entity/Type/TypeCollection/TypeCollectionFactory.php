<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Type\TypeCollection;

use Havoc\Engine\Entity\Type\TypeException;
use ReflectionClass;

/**
 * Havoc Engine entity type collection factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
abstract class TypeCollectionFactory
{
    /**
     * Create a new type collection.
     *
     * @param string $type_collection_class
     * @return TypeCollectionInterface
     * @throws \ReflectionException
     */
    public static function new(string $type_collection_class = TypeCollection::class): TypeCollectionInterface
    {
        $reflects = (new ReflectionClass($type_collection_class))->implementsInterface(TypeCollectionInterface::class);
        
        if (false === $reflects) {
            throw TypeException::typeCollectionBadClass($type_collection_class);
        }
        
        return new $type_collection_class();
    }
}