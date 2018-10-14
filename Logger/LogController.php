<?php
declare(strict_types=1);

namespace Havoc\Engine\Logger;

/**
 * Havoc Engine log controller.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class LogController implements LogControllerInterface
{
    /**
     * Logs.
     *
     * @var LogInterface[]
     */
    private $logs = [];
    
    /**
     * Returns logs.
     *
     * @param int $limit
     * @param int $offset
     * @return LogInterface[]
     */
    public function getLogs(int $limit = 0, int $offset = 0): array
    {
        if (0 === $limit) {
            return $this->logs;
        }
        
        return \array_slice($this->logs, $offset, $limit, true);
    }
    
    /**
     * @param string $from
     * @param int $limit
     * @param int $offset
     * @return LogInterface[]
     */
    public function getLogsFrom(string $from, int $limit = 0, int $offset = 0): array
    {
        $logs = $this->getLogs();
        $result = [];
        
        foreach ($logs as $log) {
            if (\in_array($from, class_implements($log->getFrom()), true)) {
                $result[] = $log;
            }
        }
    
        if (0 === $limit) {
            return $result;
        }
    
        return \array_slice($result, $offset, $limit, true);
    }
    
    /**
     * Returns a single log.
     *
     * @param int $id
     * @return LogInterface
     */
    public function getLog(int $id): LogInterface
    {
        if (!array_key_exists($id, $this->logs)) {
            throw LogException::logDoesNotExist($id);
        }
        
        return $this->logs[$id];
    }
    
    /**
     * Add a log.
     *
     * @param LogInterface[] $data
     * @param string $message
     * @param string $from
     * @param string $log_class
     * @throws \ReflectionException
     */
    public function addLog(array $data, string $message, string $from, string $log_class = Log::class): void
    {
        $id = $this->getNewKey();
        $log = LogFactory::new($id, $data, $message, $from, $log_class);
        
        $this->logs[$id] = $log;
    }
    
    /**
     * Returns the last key plus 1.
     *
     * @return int
     */
    protected function getNewKey(): int
    {
        end($this->logs);
        
        $key = (int) key($this->logs) + 1;
        
        reset($this->logs);
        
        return $key;
    }
}