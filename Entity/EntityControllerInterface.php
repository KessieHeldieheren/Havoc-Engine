<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\Grid\GridInterface;
use Havoc\Engine\Logger\LogControllerInterface;

/**
 * Havoc Engine entity controller interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
interface EntityControllerInterface
{
    /**
     * EntityController constructor method.
     *
     * @param ConfigControllerInterface $config_controller
     * @param GridInterface $grid
     * @param LogControllerInterface $logger
     */
    public function __construct(ConfigControllerInterface $config_controller, GridInterface $grid, LogControllerInterface $logger);
    
    /**
     * Returns entities.
     *
     * @return EntityInterface[]
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
    public function createEntity(string $entity_class = EntityBase::class, string $name, CoordinatesInterface $coordinates, string $icon): EntityInterface;
    
    /**
     * Attempts to silently delete an entity. No errors occur on failure.
     *
     * @param EntityInterface $entity
     * @throws \ReflectionException
     */
    public function deleteEntity(EntityInterface $entity): void;
    
    /**
     * Maps all entities onto the grid.
     */
    public function mapEntitiesToGrid(): void;
    
    /**
     * @param string $search_class
     * @return EntityInterface[]
     */
    public function getEntitiesOfClass(string $search_class): array;
}
