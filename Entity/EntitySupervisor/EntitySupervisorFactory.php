<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\EntitySupervisor;

use Havoc\Engine\Entity\EntityException;
use Havoc\Engine\Logger\LogController\LogControllerInterface;
use ReflectionClass;

/**
 * Havoc Engine entity supervisor factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class EntitySupervisorFactory
{
    /**
     * Create a new entity supervisor.
     *
     * @param \Havoc\Engine\Logger\LogController\LogControllerInterface $log_controller
     * @param string $supervisor
     * @return EntitySupervisorInterface
     * @throws \ReflectionException
     */
    public static function new(LogControllerInterface $log_controller, string $supervisor = EntitySupervisor::class): EntitySupervisorInterface
    {
        $reflects = (new ReflectionClass($supervisor))
            ->implementsInterface(EntitySupervisorInterface::class);
        
        if (false === $reflects) {
            throw EntityException::entityCollectionBadClass($supervisor);
        }
        
        return new $supervisor($log_controller);
    }
}
