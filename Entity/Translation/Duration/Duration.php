<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation\Duration;

/**
 * Havoc Engine entity translation duration.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class Duration implements DurationInterface
{
    /**
     * Duration.
     *
     * @var int
     */
    private $duration;
    
    /**
     * Duration constructor method.
     *
     * @param int $duration
     */
    public function __construct(int $duration)
    {
        $this->setDuration($duration);
    }
    
    /**
     * Returns true if duration has expired.
     *
     * @return bool
     */
    public function durationExpired(): bool
    {
        return $this->getDuration() <= 0;
    }
    
    /**
     * Decrement duration.
     */
    public function decrement(): void
    {
        $this->setDuration($this->getDuration() - 1);
    }
    
    /**
     * Returns duration.
     *
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }
    
    /**
     * Sets duration.
     *
     * @param int $duration
     */
    public function setDuration(int $duration): void
    {
        $this->duration = $duration;
    }
}
