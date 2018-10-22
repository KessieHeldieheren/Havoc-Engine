<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\EntityCollection;

use Havoc\Engine\Entity\EntityInterface;
use Havoc\Engine\WorldPoint\WorldPointInterface;

/**
 * Havoc Engine entity collection.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface EntityCollectionInterface
{
    /**
     * Get all entities.
     *
     * @return EntityInterface[]|WorldPointInterface[]
     */
    public function getEntities(): array;
    
    /**
     * Add an entity to the collection.
     *
     * @param EntityInterface $entity
     */
    public function add(EntityInterface $entity): void;
    
    /**
     * Delete an entity from the collection.
     *
     * @param EntityInterface $entity
     */
    public function delete(EntityInterface $entity): void;
    
    /**
     * Deletes all entities from the collection.
     */
    public function clean(): void;
}
