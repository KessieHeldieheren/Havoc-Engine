<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation\TranslationSupervisor;

use Havoc\Engine\Entity\EntitySupervisor\EntitySupervisorInterface;

use Havoc\Engine\Entity\Translation\TranslationException;
use Havoc\Engine\Grid\Standard\GridSupervisorInterface;
use Havoc\Engine\Logger\LogController\LogControllerInterface;
use ReflectionClass;

/**
 * Havoc Engine entity translation controller factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class TranslationSupervisorFactory
{
    /**
     * Create a new entity translation controller.
     *
     * @param \Havoc\Engine\Entity\EntitySupervisor\EntitySupervisorInterface $entity_collection
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
            throw TranslationException::translationSupervisorBadClass($supervisor);
        }
        
        return new $supervisor($entity_collection, $log_controller, $grid);
    }
}
