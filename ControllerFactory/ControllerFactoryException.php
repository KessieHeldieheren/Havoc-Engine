<?php
declare(strict_types=1);

namespace Havoc\Engine\ControllerFactory;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Exceptions\HavocEngineException;
use Havoc\Engine\Tick\TickControllerInterface;
use Havoc\Engine\World\WorldControllerInterface;

/**
 * Havoc Engine configuration exceptions.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class ControllerFactoryException extends HavocEngineException
{
    public const CONFIG_CONTROLLER_BAD_CLASS = 0x3000;
    public const WORLD_CONTROLLER_BAD_CLASS = 0x3001;
    public const ENTITY_CONTROLLER_BAD_CLASS = 0x3002;
    public const TICK_CONTROLLER_BAD_CLASS = 0x3003;
    
    /**
     * @param string $given_class
     * @return ControllerFactoryException
     */
    public static function configControllerBadClass(string $given_class): self
    {
        $required_class = ConfigControllerInterface::class;
        
        return new self (
            sprintf("Cannot instantiate the config controller module using %s, as it must implement %s.", $given_class, $required_class),
            self::CONFIG_CONTROLLER_BAD_CLASS
        );
    }
    
    /**
     * @param string $given_class
     * @return ControllerFactoryException
     */
    public static function worldControllerBadClass(string $given_class): self
    {
        $required_class = WorldControllerInterface::class;
    
        return new self (
            sprintf("Cannot instantiate the config controller module using %s, as it must implement %s.", $given_class, $required_class),
            self::WORLD_CONTROLLER_BAD_CLASS
        );
    }
    
    /**
     * @param string $given_class
     * @return ControllerFactoryException
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
