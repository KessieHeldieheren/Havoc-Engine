<?php
declare(strict_types=1);

namespace Havoc\Engine\Logger;

use ReflectionClass;

/**
 * Havoc Core log factory.
 *
 * @package Havoc-Core
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
     * @param int $tick
     * @param string $log_class
     * @return LogInterface
     * @throws \ReflectionException
     */
    public static function new(int $id, array $data, string $message, string $from, int $tick, string $log_class = Log::class): LogInterface
    {
        $reflects = (new ReflectionClass($log_class))->implementsInterface(LogInterface::class);
    
        if (false === $reflects) {
            throw LogException::logBadClass($log_class);
        }
        
        return new $log_class($id, $data, $message, $from, $tick);
    }
}
