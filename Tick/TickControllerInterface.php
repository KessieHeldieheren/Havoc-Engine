<?php
declare(strict_types=1);

namespace Havoc\Engine\Tick;

/**
 * Havoc Engine tick controller interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface TickControllerInterface
{
    /**
     * Returns current.
     *
     * @return int
     */
    public function getTick(): int;
    
    /**
     * Increment the current tick.
     */
    public function incrementTick(): void;
}
