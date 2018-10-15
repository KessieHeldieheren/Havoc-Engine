<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity;

use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\WorldPoint\WorldPointInterface;

/**
 * Havoc Engine entity collection interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
interface EntityCollectionInterface
{
    /**
     * Returns entities.
     *
     * @return EntityInterface[]|WorldPointInterface[]
     */
    public function getEntities(): array;
    
    /**
     * Create a new entity.
     *
     * @param string $entity_class
     * @param string $name
     * @param CoordinatesInterface $coordinates
     * @param string $icon
     * @return EntityInterface
     */
    public function createEntity(string $entity_class = Entity::class, string $name, CoordinatesInterface $coordinates, string $icon): EntityInterface;
    
    /**
     * Attempts to silently delete an entity. No errors occur on failure.
     *
     * @param EntityInterface $entity
     * @throws \ReflectionException
     */
    public function deleteEntity(EntityInterface $entity): void;
    
    /**
     * @param string $search_class
     * @return EntityInterface[]
     */
    public function getEntitiesOfClass(string $search_class): array;
}
