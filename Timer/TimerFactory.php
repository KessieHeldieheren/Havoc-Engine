<?php
declare(strict_types=1);

namespace Havoc\Engine\Timer;

use Havoc\Engine\Tick\TickController\TickControllerInterface;
use Havoc\Engine\Timer\Countdown\Countdown;
use Havoc\Engine\Timer\Countdown\CountdownInterface;
use Havoc\Engine\Timer\Counter\Counter;
use Havoc\Engine\Timer\Counter\CounterInterface;
use Havoc\Engine\Timer\Repeater\RepeaterInterface;

/**
 * Havoc Engine timer factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
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
    
        if ($reflects === false) {
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
    
        if ($reflects === false) {
            throw TimerException::countdownBadClass($timer_class);
        }
        
        return new $timer_class($tick_controller);
    }
    
    /**
     * Create a new counter timer.
     *
     * @param TickControllerInterface $tick_controller
     * @param string $timer_class
     * @return RepeaterInterface
     * @throws \ReflectionException
     */
    public static function newRepeater(TickControllerInterface $tick_controller, $timer_class = Counter::class): RepeaterInterface
    {
        $reflects = (new \ReflectionClass($timer_class))->implementsInterface(RepeaterInterface::class);
        
        if ($reflects === false) {
            throw TimerException::repeaterBadClass($timer_class);
        }
        
        return new $timer_class($tick_controller);
    }
}
