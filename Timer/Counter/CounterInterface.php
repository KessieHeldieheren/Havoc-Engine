<?php
declare(strict_types=1);

namespace Havoc\Engine\Timer\Counter;

use Havoc\Engine\Tick\TickController\TickControllerInterface;

/**
 * Havoc Engine counter timer interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface CounterInterface
{
    /**
     * Counter constructor method.
     *
     * @param TickControllerInterface $tick_controller
     */
    public function __construct(TickControllerInterface $tick_controller);
    
    /**
     * Returns the elapsed time.
     *
     * @return int
     */
    public function getElapsed(): int;
    
    /**
     * Returns start_tick.
     *
     * @return int
     */
    public function getStartTick(): int;
}
