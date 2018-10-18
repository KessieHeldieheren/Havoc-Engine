<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation;

use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\Entity\EntityCollectionInterface;
use Havoc\Engine\Entity\EntityInterface;
use Havoc\Engine\Grid\GridInterface;
use Havoc\Engine\Logger\LogControllerInterface;

/**
 * Havoc Engine entity translation controller interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
interface TranslationControllerInterface
{
    /**
     * TranslationController constructor method.
     *
     * @param EntityCollectionInterface $entity_collection
     * @param LogControllerInterface $log_controller
     * @param GridInterface $grid
     */
    public function __construct(EntityCollectionInterface $entity_collection, LogControllerInterface $log_controller, GridInterface $grid);
    
    /**
     * Teleport an entity to a set of coordinates.
     *
     * @param EntityInterface $entity
     * @param CoordinatesInterface $coordinates
     */
    public function teleportToCoordinates(EntityInterface $entity, CoordinatesInterface $coordinates): void;
}
