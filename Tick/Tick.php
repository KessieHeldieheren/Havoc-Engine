<?php
declare(strict_types=1);

namespace Havoc\Engine\Tick;

/**
 * Havoc Engine tick.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class Tick implements TickInterface
{
    /**
     * Game tick.
     *
     * @var int
     */
    private $tick = 0;
    
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
    public function setTick(int $tick): void
    {
        $this->tick = $tick;
    }
}
