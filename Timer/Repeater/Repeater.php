<?php
declare(strict_types=1);

namespace Havoc\Engine\Timer\Repeater;

use Havoc\Engine\Tick\TickController\TickControllerInterface;

/**
 * Havoc Engine repeater timer.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class Repeater implements RepeaterInterface
{
    /**
     * Tick controller.
     *
     * @var TickControllerInterface
     */
    private $tick_controller;
    
    /**
     * Interval of repeats.
     *
     * @var int
     */
    private $repeats_after_interval;
    
    /**
     * Ticks to repeat after.
     *
     * @var int
     */
    private $repeats_after;
    
    /**
     * The tick the timer began at.
     *
     * @var int
     */
    private $start_tick;
    
    /**
     * Last tick the timer has repeated.
     *
     * @var int
     */
    private $last_repeat_tick;
    
    /**
     * Repeater constructor method.
     *
     * @param \Havoc\Engine\Tick\TickController\TickControllerInterface $tick_controller
     * @param int $repeats_after_interval
     */
    public function __construct(TickControllerInterface $tick_controller, int $repeats_after_interval)
    {
        $this->setTickController($tick_controller);
        $this->setRepeatsAfterInterval($repeats_after_interval);
        $this->setRepeatsAfter();
    }
    
    /**
     * Returns true if the timer has elapsed its interval.
     *
     * @return bool
     */
    public function hasReachedRepeatInterval(): bool
    {
        $repeated = $this->getRepeatsAfter() <= $this->getTickController()->getCurrentTick();
        
        if (false === $repeated) {
            return false;
        }
        
        $this->setRepeatsAfter();
        
        return true;
    }
    
    /**
     * Returns tick_controller.
     *
     * @return \Havoc\Engine\Tick\TickController\TickControllerInterface
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
     * Returns repeats_after_interval.
     *
     * @return int
     */
    public function getRepeatsAfterInterval(): int
    {
        return $this->repeats_after_interval;
    }
    
    /**
     * Sets repeats_after_interval.
     *
     * @param int $repeats_after_interval
     */
    public function setRepeatsAfterInterval(int $repeats_after_interval): void
    {
        $this->repeats_after_interval = $repeats_after_interval;
    }
    
    /**
     * Returns repeats_after.
     *
     * @return int
     */
    public function getRepeatsAfter(): int
    {
        return $this->repeats_after;
    }
    
    /**
     * Sets repeats_after.
     */
    protected function setRepeatsAfter(): void
    {
        $repeats_after = $this->getTickController()->getCurrentTick() + $this->getRepeatsAfterInterval();
        
        $this->repeats_after = $repeats_after;
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
    
    /**
     * Returns last_repeat_tick.
     *
     * @return int
     */
    public function getLastRepeatTick(): int
    {
        return $this->last_repeat_tick;
    }
    
    /**
     * Sets last_repeat_tick.
     *
     * @param int $last_repeat_tick
     */
    protected function setLastRepeatTick(int $last_repeat_tick): void
    {
        $this->last_repeat_tick = $last_repeat_tick;
    }
}
