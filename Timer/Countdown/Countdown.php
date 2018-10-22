<?php
declare(strict_types=1);

namespace Havoc\Engine\Timer\Countdown;

use Havoc\Engine\Tick\TickController\TickControllerInterface;

/**
 * Havoc Engine countdown timer.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class Countdown implements CountdownInterface
{
    /**
     * Tick controller.
     *
     * @var \Havoc\Engine\Tick\TickController\TickControllerInterface
     */
    private $tick_controller;
    
    /**
     * Ticks to count down from.
     *
     * @var int
     */
    private $expires_after;
    
    /**
     * The tick the timer began at.
     *
     * @var int
     */
    private $start_tick;
    
    /**
     * Countdown constructor method.
     *
     * @param TickControllerInterface $tick_controller
     * @param int $expires_after
     */
    public function __construct(TickControllerInterface $tick_controller, int $expires_after)
    {
        $this->setTickController($tick_controller);
        $this->setExpiresafter($expires_after);
        $this->setStartTick($tick_controller->getCurrentTick());
    }
    
    /**
     * Returns true if the timer has expired.
     *
     * @return bool
     */
    public function hasExpired(): bool
    {
        return $this->getExpiresafter() <= $this->getTickController()->getCurrentTick();
    }
    
    /**
     * Returns the number of ticks remaining on the timer.
     *
     * @return int
     */
    public function getExpiry(): int
    {
        return $this->getExpiresafter() - $this->getTickController()->getCurrentTick();
    }
    
    /**
     * Returns the elapsed time.
     *
     * @return int
     */
    public function getElapsed(): int
    {
        return abs($this->getStartTick() - $this->getTickController()->getCurrentTick());
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
     * @param \Havoc\Engine\Tick\TickController\TickControllerInterface $tick_controller
     */
    public function setTickController(TickControllerInterface $tick_controller): void
    {
        $this->tick_controller = $tick_controller;
    }
    
    /**
     * Returns count_down_from.
     *
     * @return int
     */
    public function getExpiresafter(): int
    {
        return $this->expires_after;
    }
    
    /**
     * Sets count_down_from.
     *
     * @param int $expires_after
     */
    public function setExpiresafter(int $expires_after): void
    {
        $expires_after = $this->getTickController()->getCurrentTick() + $expires_after;
        
        $this->expires_after = $expires_after;
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
