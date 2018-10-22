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
class EntityCollection implements EntityCollectionInterface
{
    /**
     * World entities.
     *
     * @var EntityInterface[]|WorldPointInterface[]
     */
    private $entities = [];
    
    /**
     * Get all entities.
     *
     * @return EntityInterface[]|WorldPointInterface[]
     */
    public function getEntities(): array
    {
        return $this->entities;
    }
    
    /**
     * Add an entity to the collection.
     *
     * @param EntityInterface $entity
     */
    public function add(EntityInterface $entity): void
    {
        $this->entities[$entity->getId()] = $entity;
    }
    
    /**
     * Delete an entity from the collection.
     *
     * @param EntityInterface $entity
     */
    public function delete(EntityInterface $entity): void
    {
        unset ($this->entities[$entity->getId()]);
    }
    
    /**
     * Deletes all entities from the collection.
     */
    public function clean(): void
    {
        $this->entities = [];
    }
}
