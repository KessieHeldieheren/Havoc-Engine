<?php
declare(strict_types=1);

namespace Havoc\Engine\Timer\Countdown;

use Havoc\Engine\Tick\TickController\TickControllerInterface;

/**
 * Havoc Engine countdown timer interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface CountdownInterface
{
    /**
     * Countdown constructor method.
     *
     * @param TickControllerInterface $tick_controller
     * @param int $expires_after
     */
    public function __construct(TickControllerInterface $tick_controller, int $expires_after);
    
    /**
     * Returns true if the timer has expired.
     *
     * @return bool
     */
    public function hasExpired(): bool;
    
    /**
     * Returns the number of ticks remaining on the timer.
     *
     * @return int
     */
    public function getExpiry(): int;
    
    /**
     * Returns tick_controller.
     *
     * @return TickControllerInterface
     */
    public function getTickController(): TickControllerInterface;
    
    /**
     * Sets tick_controller.
     *
     * @param TickControllerInterface $tick_controller
     */
    public function setTickController(TickControllerInterface $tick_controller): void;
    
    /**
     * Returns count_down_from.
     *
     * @return int
     */
    public function getExpiresafter(): int;
    
    /**
     * Sets count_down_from.
     *
     * @param int $expires_after
     */
    public function setExpiresafter(int $expires_after): void;
    
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
