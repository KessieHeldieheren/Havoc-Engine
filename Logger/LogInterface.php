<?php
declare(strict_types=1);

namespace Havoc\Engine\Logger;

/**
 * Havoc Core log interface.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
interface LogInterface
{
    /**
     * Log constructor method.
     *
     * @param int $id
     * @param array $data
     * @param string $message
     * @param string $from
     * @param int $tick
     */
    public function __construct(int $id, array $data, string $message, string $from, int $tick);
    
    /**
     * Returns id.
     *
     * @return int
     */
    public function getId(): int;
    
    /**
     * Returns data.
     *
     * @return array
     */
    public function getData(): array;
    
    /**
     * Returns message.
     *
     * @return string
     */
    public function getMessage(): string;
    
    /**
     * Returns from.
     *
     * @return string
     */
    public function getFrom(): string;
    
    /**
     * Format log as a string.
     *
     * @return string
     */
    public function __toString(): string;
    
    /**
     * Returns tick.
     *
     * @return int
     */
    public function getTick(): int;
}
