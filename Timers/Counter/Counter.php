<?php
declare(strict_types=1);

namespace Havoc\Engine\Timers\Counter;

use Havoc\Engine\Tick\TickControllerInterface;

/**
 * Havoc Engine counter timer.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class Counter implements CounterInterface
{
    /**
     * Tick controller.
     *
     * @var TickControllerInterface
     */
    private $tick_controller;
    
    /**
     * The tick the timer began at.
     *
     * @var int
     */
    private $start_tick;
    
    /**
     * Counter constructor method.
     *
     * @param TickControllerInterface $tick_controller
     */
    public function __construct(TickControllerInterface $tick_controller)
    {
        $this->setTickController($tick_controller);
        $this->setStartTick($tick_controller->getTick());
    }
    
    /**
     * Returns the elapsed time.
     *
     * @return int
     */
    public function getElapsed(): int
    {
        return abs($this->getStartTick() - $this->getTickController()->getTick());
    }
    
    /**
     * Returns tick_controller.
     *
     * @return TickControllerInterface
     */
    public function getTickController(): TickControllerInterface
    {
        return $this->tick_controller;
    }
    
    /**
     * Sets tick_controller.
     *
     * @param TickControllerInterface $tick_controller
     */
    public function setTickController(TickControllerInterface $tick_controller): void
    {
        $this->tick_controller = $tick_controller;
    }
    
    /**
     * Returns start_tick.
     *
     * @return int
     */
    public function getStartTick(): int
    {
        return $this->start_tick;
    }
    
    /**
     * Sets start_tick.
     *
     * @param int $start_tick
     */
    protected function setStartTick(int $start_tick): void
    {
        $this->start_tick = $start_tick;
    }
}
