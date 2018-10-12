<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\Grid\GridInterface;

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
     */
    public function __construct(ConfigControllerInterface $config_controller, GridInterface $grid);
    
    /**
     * Returns entities.
     *
     * @return EntityInterface[]
     */
    public function getEntities(): array;
    
    /**
     * Returns the last key plus 1.
     *
     * @return int
     */
    public function getNewKey(): int;
    
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
     * @param int $id
     */
    public function deleteEntity(int $id): void;
    
    /**
     * Maps all entities onto the grid.
     */
    public function mapEntitiesToGrid(): void;
}
