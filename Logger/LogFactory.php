<?php
declare(strict_types=1);

namespace Havoc\Engine\Logger;

use ReflectionClass;

/**
 * Havoc Engine log factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
abstract class LogFactory
{
    /**
     * Create a new log.
     *
     * @param int $id
     * @param array $data
     * @param string $message
     * @param string $from
     * @param string $log_class
     * @return LogInterface
     * @throws \ReflectionException
     */
    public static function new(int $id, array $data, string $message, string $from, string $log_class = Log::class): LogInterface
    {
        $reflects = (new ReflectionClass($log_class))->implementsInterface(LogInterface::class);
    
        if (false === $reflects) {
            throw LogException::logBadClass($log_class);
        }
        
        return new $log_class($id, $data, $message, $from);
    }
}
