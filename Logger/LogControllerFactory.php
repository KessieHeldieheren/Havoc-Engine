<?php
declare(strict_types=1);

namespace Havoc\Engine\Logger;

use ReflectionClass;

/**
 * Havoc Engine log controller factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
abstract class LogControllerFactory
{
    /**
     * Create a new log controller.
     *
     * @param string $controller
     * @return LogControllerInterface
     */
    public static function newLogController(string $controller): LogControllerInterface
    {
        $reflects = (new ReflectionClass($controller))->implementsInterface(LogControllerInterface::class);
        
        if (false === $reflects) {
            throw LogException::logControllerBadClass($controller);
        }
        
        return new $controller();
    }
}
