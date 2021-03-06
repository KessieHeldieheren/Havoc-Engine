<?php
declare(strict_types=1);

namespace Havoc\Engine\Tick\TickController;

use Havoc\Engine\Tick\TickException;
use ReflectionClass;

/**
 * Havoc Engine tick controller factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
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
        
        if ($reflects === false) {
            throw TickException::tickControllerBadClass($controller);
        }
        
        return new $controller();
    }
}
