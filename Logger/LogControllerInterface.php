<?php
declare(strict_types=1);

namespace Havoc\Engine\Logger;

/**
 * Havoc Engine log controller interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
interface LogControllerInterface
{
    /**
     * Returns logs.
     *
     * @param int $limit
     * @param int $offset
     * @return LogInterface[]
     */
    public function getLogs(int $limit = 0, int $offset = 0): array;
    
    /**
     * Returns a single log.
     *
     * @param int $id
     * @return LogInterface
     */
    public function getLog(int $id): LogInterface;
    
    /**
     * Add a log.
     *
     * @param LogInterface[] $data
     * @param string $message
     * @param string $from
     * @param string $log_class
     * @throws \ReflectionException
     */
    public function addLog(array $data, string $message, string $from, string $log_class = Log::class): void;
    
    /**
     * @param string $from
     * @param int $limit
     * @param int $offset
     * @return LogInterface[]
     */
    public function getLogsFrom(string $from, int $limit = 0, int $offset = 0): array;
}
