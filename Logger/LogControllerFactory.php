<?php
declare(strict_types=1);

namespace Havoc\Engine\Logger;

use Havoc\Engine\Tick\TickControllerInterface;
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
     * @param TickControllerInterface $tick_controller
     * @param string $controller
     * @return LogControllerInterface
     * @throws \ReflectionException
     */
    public static function newLogController(TickControllerInterface $tick_controller, string $controller): LogControllerInterface
    {
        $reflects = (new ReflectionClass($controller))->implementsInterface(LogControllerInterface::class);
        
        if (false === $reflects) {
            throw LogException::logControllerBadClass($controller);
        }
        
        return new $controller($tick_controller);
    }
}
