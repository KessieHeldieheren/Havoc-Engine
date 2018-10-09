<?php
declare(strict_types=1);

namespace Havoc\Engine\Tick;

/**
 * Havoc Engine tick controller.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class TickController implements TickControllerInterface
{
    /**
     * Current tick.
     *
     * @var int
     */
    private $tick = 0;
    
    /**
     * Returns current.
     *
     * @return int
     */
    public function getTick(): int
    {
        return $this->tick;
    }
    
    /**
     * Increment the current tick.
     */
    public function incrementTick(): void
    {
        ++$this->tick;
    }
}
