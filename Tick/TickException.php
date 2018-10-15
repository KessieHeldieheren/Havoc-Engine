<?php
declare(strict_types=1);

namespace Havoc\Engine\Tick;

use Havoc\Engine\Exceptions\HavocEngineException;

/**
 * Havoc Engine tick exceptions.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class TickException extends HavocEngineException
{
    public const TICK_CONTROLLER_BAD_CLASS = 0x1;
    
    /**
     * @param string $given_class
     * @return TickException
     */
    public static function tickControllerBadClass(string $given_class): self
    {
        $required_class = TickControllerInterface::class;
        
        return new self (
            sprintf("Cannot instantiate the tick controller module using %s, as it must implement %s.", $given_class, $required_class),
            self::TICK_CONTROLLER_BAD_CLASS
        );
    }
}
