<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation;

use Havoc\Engine\Entity\EntitySupervisorInterface;

use Havoc\Engine\Grid\Standard\GridSupervisorInterface;
use Havoc\Engine\Logger\LogControllerInterface;
use ReflectionClass;

/**
 * Havoc Core entity translation controller factory.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class TranslationSupervisorFactory
{
    /**
     * Create a new entity translation controller.
     *
     * @param EntitySupervisorInterface $entity_collection
     * @param LogControllerInterface $log_controller
     * @param GridSupervisorInterface $grid
     * @param string $supervisor
     * @return TranslationSupervisorInterface
     * @throws \ReflectionException
     */
    public static function new(EntitySupervisorInterface $entity_collection, LogControllerInterface $log_controller, GridSupervisorInterface $grid, string $supervisor = TranslationSupervisor::class): TranslationSupervisorInterface
    {
        $reflects = (new ReflectionClass($supervisor))->implementsInterface(TranslationSupervisorInterface::class);
        
        if (false === $reflects) {
            throw TranslationException::translationControllerBadClass($supervisor);
        }
        
        return new $supervisor($entity_collection, $log_controller, $grid);
    }
}
