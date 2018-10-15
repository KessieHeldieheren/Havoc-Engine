<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Entity\Type\TypeControllerInterface;
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
     * Maps all entities onto the grid.
     */
    public function mapEntitiesToGrid(): void;
    
    /**
     * Returns entity_collection.
     *
     * @return EntityCollectionInterface
     */
    public function getEntityCollection(): EntityCollectionInterface;
    
    /**
     * Returns type_controller.
     *
     * @return TypeControllerInterface
     */
    public function getTypeController(): TypeControllerInterface;
}
