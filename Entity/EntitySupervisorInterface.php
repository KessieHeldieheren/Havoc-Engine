<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity;

use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\WorldPoint\WorldPointInterface;

/**
 * Havoc Core entity supervisor interface.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
interface EntitySupervisorInterface
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
}
