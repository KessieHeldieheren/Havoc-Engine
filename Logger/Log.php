<?php
declare(strict_types=1);

namespace Havoc\Engine\Logger;

/**
 * Havoc Engine log.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class Log implements LogInterface
{
    /**
     * Overall format of a stringified log.
     */
    public const LOG_FORMAT = "T:%s - %s";
    
    /**
     * Log ID.
     *
     * @var int
     */
    private $id;
    
    /**
     * Log data.
     *
     * @var array
     */
    private $data = [];
    
    /**
     * Log message.
     *
     * @var string
     */
    private $message;
    
    /**
     * FQCN of class that created this log.
     *
     * @var string
     */
    private $from;
    
    /**
     * The tick at which point the log was added.
     *
     * @var int
     */
    private $tick;
    
    /**
     * Log constructor method.
     *
     * @param int $id
     * @param array $data
     * @param string $message
     * @param string $from
     * @param int $tick
     */
    public function __construct(int $id, array $data, string $message, string $from, int $tick)
    {
        $this->setId($id);
        $this->setData($data);
        $this->setMessage($message);
        $this->setFrom($from);
        $this->setTick($tick);
    }
    
    /**
     * Returns id.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    
    /**
     * Sets id.
     *
     * @param int $id
     */
    protected function setId(int $id): void
    {
        $this->id = $id;
    }
    
    /**
     * Returns data.
     *
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
    
    /**
     * Sets data.
     *
     * @param array $data
     */
    protected function setData(array $data): void
    {
        $this->data = $data;
    }
    
    /**
     * Returns message.
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
    
    /**
     * Sets message.
     *
     * @param string $message
     */
    protected function setMessage(string $message): void
    {
        $this->message = $message;
    }
    
    /**
     * Returns from.
     *
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }
    
    /**
     * Sets from.
     *
     * @param string $from
     */
    protected function setFrom(string $from): void
    {
        $this->from = $from;
    }
    
    /**
     * Returns tick.
     *
     * @return int
     */
    public function getTick(): int
    {
        return $this->tick;
    }
    
    /**
     * Sets tick.
     *
     * @param int $tick
     */
    protected function setTick(int $tick): void
    {
        $this->tick = $tick;
    }
    
    /**
     * Format log as a string.
     *
     * @return string
     */
    public function string(): string
    {
        return sprintf(
            self::LOG_FORMAT,
            $this->getTick(),
            vsprintf($this->getMessage(), $this->getData())
        );
    }
}
