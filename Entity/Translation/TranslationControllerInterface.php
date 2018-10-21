<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation;

use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\Entity\EntityInterface;
use Havoc\Engine\Entity\EntitySupervisorInterface;
use Havoc\Engine\Grid\GridInterface;
use Havoc\Engine\Logger\LogControllerInterface;

/**
  * Havoc Engine entity translation controller interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface TranslationControllerInterface
{
    /**
     * TranslationController constructor method.
     *
     * @param EntitySupervisorInterface $entity_supervisor
     * @param LogControllerInterface $log_controller
     * @param GridInterface $grid
     */
    public function __construct(EntitySupervisorInterface $entity_supervisor, LogControllerInterface $log_controller, GridInterface $grid);
    
    /**
     * Teleport an entity to a set of coordinates.
     *
     * @param EntityInterface $entity
     * @param CoordinatesInterface $coordinates
     */
    public function teleportToCoordinates(EntityInterface $entity, CoordinatesInterface $coordinates): void;
}
