<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation;

use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\Entity\EntitySupervisorInterface;
use Havoc\Engine\Entity\EntityInterface;
use Havoc\Engine\Grid\Standard\GridSupervisorInterface;
use Havoc\Engine\Logger\LogControllerInterface;

/**
 * Havoc Core entity translation controller interface.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
interface TranslationSupervisorInterface
{
    /**
     * TranslationSupervisor constructor method.
     *
     * @param EntitySupervisorInterface $entity_collection
     * @param LogControllerInterface $log_controller
     * @param GridSupervisorInterface $grid
     */
    public function __construct(EntitySupervisorInterface $entity_collection, LogControllerInterface $log_controller, GridSupervisorInterface $grid);
    
    /**
     * Teleport an entity to a set of coordinates.
     *
     * @param EntityInterface $entity
     * @param CoordinatesInterface $coordinates
     */
    public function teleportToCoordinates(EntityInterface $entity, CoordinatesInterface $coordinates): void;
}
