<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\EntitySupervisor;

use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\Entity\Entity;
use Havoc\Engine\Entity\EntityCollection\EntityCollectionInterface;
use Havoc\Engine\Entity\EntityInterface;

/**
 * Havoc Engine entity supervisor interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface EntitySupervisorInterface
{
    /**
     * Returns entities.
     *
     * @return EntityCollectionInterface
     */
    public function getEntityCollection(): EntityCollectionInterface;
    
    /**
     * Create a new entity.
     *
     * @param string $name
     * @param CoordinatesInterface $coordinates
     * @param string $icon
     * @param array $types
     * @param string $entity_class
     * @return EntityInterface
     */
    public function create(string $name, CoordinatesInterface $coordinates, string $icon, array $types = [], string $entity_class = Entity::class): EntityInterface;
    
    /**
     * Attempts to silently delete an entity. No errors occur on failure.
     *
     * @param EntityInterface $entity
     * @throws \ReflectionException
     */
    public function delete(EntityInterface $entity): void;
    
    /**
     * @param string $search_class
     * @return EntityInterface[]
     */
    public function getByClass(string $search_class): array;
    
    /**
     * Retrieve entity by ID.
     *
     * @param int $id
     * @return EntityInterface|null
     */
    public function getById(int $id): ?EntityInterface;
}
