<?php
declare(strict_types=1);

namespace Havoc\Engine\Logger\LogController;

use Havoc\Engine\Logger\LogException;
use Havoc\Engine\Tick\TickController\TickControllerInterface;
use ReflectionClass;

/**
 * Havoc Engine log controller factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
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
