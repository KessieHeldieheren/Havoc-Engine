<?php
declare(strict_types=1);

namespace Havoc\Engine\Logger;

use Havoc\Engine\Tick\TickControllerInterface;

/**
 * Havoc Engine log controller.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
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
     * Tick controller.
     *
     * @var TickControllerInterface
     */
    private $tick_controller;
    
    /**
     * LogController constructor method.
     *
     * @param TickControllerInterface $tick_controller
     */
    public function __construct(TickControllerInterface $tick_controller)
    {
        $this->setTickController($tick_controller);
    }
    
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
        $tick = $this->getTickController()->getTick();
        $log = LogFactory::new($id, $data, $message, $from, $tick, $log_class);
        
        $this->logs[$id] = $log;
    }
    
    /**
     * Returns tick_controller.
     *
     * @return TickControllerInterface
     */
    public function getTickController(): TickControllerInterface
    {
        return $this->tick_controller;
    }
    
    /**
     * Sets tick_controller.
     *
     * @param TickControllerInterface $tick_controller
     */
    public function setTickController(TickControllerInterface $tick_controller): void
    {
        $this->tick_controller = $tick_controller;
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
