<?php
declare(strict_types=1);

namespace Havoc\Engine\Tick;

use ReflectionClass;

/**
 * Havoc Core tick controller factory.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
abstract class TickControllerFactory
{
    /**
     * Create a new tick controller.
     *
     * @param string $controller
     * @return TickControllerInterface
     * @throws \ReflectionException
     */
    public static function newTickController(string $controller = TickController::class): TickControllerInterface
    {
        $reflects = (new ReflectionClass($controller))->implementsInterface(TickControllerInterface::class);
        
        if (false === $reflects) {
            throw TickException::tickControllerBadClass($controller);
        }
        
        return new $controller();
    }
}
