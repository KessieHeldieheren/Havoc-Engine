<?php
declare(strict_types=1);

namespace Havoc\Engine\Timers;

use Havoc\Engine\Tick\TickControllerInterface;
use Havoc\Engine\Timers\Countdown\Countdown;
use Havoc\Engine\Timers\Countdown\CountdownInterface;
use Havoc\Engine\Timers\Counter\Counter;
use Havoc\Engine\Timers\Counter\CounterInterface;

/**
 * Havoc Engine timer factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
abstract class TimerFactory
{
    /**
     * Create a new countdown timer.
     *
     * @param TickControllerInterface $tick_controller
     * @param int $expires_after
     * @param string $timer_class
     * @return CountdownInterface
     * @throws \ReflectionException
     * @var CountdownInterface $timer_class
     */
    public static function newCountdown(TickControllerInterface $tick_controller, int $expires_after, string $timer_class = Countdown::class): CountdownInterface
    {
        $reflects = (new \ReflectionClass($timer_class))->implementsInterface(CountdownInterface::class);
    
        if (false === $reflects) {
            throw TimerException::countdownBadClass($timer_class);
        }
        
        return new $timer_class($tick_controller, $expires_after);
    }
    
    /**
     * Create a new counter timer.
     *
     * @param TickControllerInterface $tick_controller
     * @param string $timer_class
     * @return CounterInterface
     * @throws \ReflectionException
     */
    public static function newCounter(TickControllerInterface $tick_controller, $timer_class = Counter::class): CounterInterface
    {
        $reflects = (new \ReflectionClass($timer_class))->implementsInterface(CounterInterface::class);
    
        if (false === $reflects) {
            throw TimerException::countdownBadClass($timer_class);
        }
        
        return new $tick_controller();
    }
}