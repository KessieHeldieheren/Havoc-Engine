<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation\Duration;

/**
 * Havoc Engine entity translation duration interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface DurationInterface
{
    /**
     * Duration constructor method.
     *
     * @param int $duration
     */
    public function __construct(int $duration);
    
    /**
     * Sets duration.
     *
     * @param int $duration
     */
    public function setDuration(int $duration): void;
    
    /**
     * Returns duration.
     *
     * @return int
     */
    public function getDuration(): int;
    
    /**
     * Decrement duration.
     */
    public function decrement(): void;
}
