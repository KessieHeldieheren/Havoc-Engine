<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity;

use Havoc\Engine\Entity\EntityCollectionInterface;
use ReflectionClass;

/**
 * Havoc Engine entity collection.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class EntityCollectionFactory
{
    /**
     * Create a new entity collection.
     *
     * @param string $entity_collection
     * @return EntityCollectionInterface
     * @throws \ReflectionException
     */
    public static function new(string $entity_collection = EntityCollection::class): EntityCollectionInterface
    {
        $reflects = (new ReflectionClass($entity_collection))->implementsInterface(EntityCollectionInterface::class);
    
        if (false === $reflects) {
            throw EntityException::entityCollectionBadClass($entity_collection);
        }
        
        return new $entity_collection();
    }
}
