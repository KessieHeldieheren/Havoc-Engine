<?php
declare(strict_types=1);

namespace Havoc\Engine\Timers\Repeater;

use Havoc\Engine\Tick\TickControllerInterface;

/**
 * Havoc Engine repeater timer.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
interface RepeaterInterface
{
    /**
     * Repeater constructor method.
     *
     * @param TickControllerInterface $tick_controller
     * @param int $repeats_after_interval
     */
    public function __construct(TickControllerInterface $tick_controller, int $repeats_after_interval);
    
    /**
     * Returns true if the timer has elapsed its interval.
     *
     * @return bool
     */
    public function hasReachedRepeatInterval(): bool;
    
    /**
     * Returns repeats_after_interval.
     *
     * @return int
     */
    public function getRepeatsAfterInterval(): int;
    
    /**
     * Sets repeats_after_interval.
     *
     * @param int $repeats_after_interval
     */
    public function setRepeatsAfterInterval(int $repeats_after_interval): void;
    
    /**
     * Returns repeats_after.
     *
     * @return int
     */
    public function getRepeatsAfter(): int;
    
    /**
     * Returns start_tick.
     *
     * @return int
     */
    public function getStartTick(): int;
    
    /**
     * Returns last_repeat_tick.
     *
     * @return int
     */
    public function getLastRepeatTick(): int;
}
