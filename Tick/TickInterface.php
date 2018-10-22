<?php
declare(strict_types=1);

namespace Havoc\Engine\Tick;

/**
 * Havoc Engine tick interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface TickInterface
{
    /**
     * Returns tick.
     *
     * @return int
     */
    public function getTick(): int;
    
    /**
     * Sets tick.
     *
     * @param int $tick
     */
    public function setTick(int $tick): void;
}
