<?php
declare(strict_types=1);

namespace Havoc\Engine\Timers;

use Havoc\Engine\Exceptions\HavocEngineException;
use Havoc\Engine\Timers\Countdown\CountdownInterface;
use Havoc\Engine\Timers\Counter\CounterInterface;
use Havoc\Engine\Timers\Repeater\RepeaterInterface;

/**
 * Havoc Engine timer exceptions.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class TimerException extends HavocEngineException
{
    public const COUNTDOWN_BAD_CLASS = 0x1;
    public const COUNTER_BAD_CLASS = 0x2;
    public const REPEATER_BAD_CLASS = 0x3;
    
    /**
     * @param string $given_class
     * @return TimerException
     */
    public static function countdownBadClass(string $given_class): self
    {
        $required_class = CountdownInterface::class;
    
        return new self (
            sprintf("Cannot create a countdown timer using %s, as it must implement %s.", $given_class, $required_class),
            self::COUNTDOWN_BAD_CLASS
        );
    }
    
    /**
     * @param string $given_class
     * @return TimerException
     */
    public static function counterBadClass(string $given_class): self
    {
        $required_class = CounterInterface::class;
        
        return new self (
            sprintf("Cannot create a counter timer using %s, as it must implement %s.", $given_class, $required_class),
            self::COUNTER_BAD_CLASS
        );
    }
    
    /**
     * @param string $given_class
     * @return TimerException
     */
    public static function repeaterBadClass(string $given_class): self
    {
        $required_class = RepeaterInterface::class;
        
        return new self (
            sprintf("Cannot create a repeater timer using %s, as it must implement %s.", $given_class, $required_class),
            self::REPEATER_BAD_CLASS
        );
    }
}
