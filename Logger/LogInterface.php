<?php
declare(strict_types=1);

namespace Havoc\Engine\Logger;

/**
 * Havoc Engine log interface.
 *
 * @package Havoc-Engine
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
     */
    public function __construct(int $id, array $data, string $message, string $from);
    
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
}