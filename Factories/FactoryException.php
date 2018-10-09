<?php
declare(strict_types=1);

namespace Havoc\Engine\Factories;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\Exceptions\HavocEngineException;
use Havoc\Engine\Grid\GridInterface;
use Havoc\Engine\Render\RenderInterface;
use Havoc\Engine\Tick\TickControllerInterface;
use Havoc\Engine\World\WorldControllerInterface;

/**
 * Havoc Engine configuration exceptions.
 *
 * Exception set: 3.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class FactoryException extends HavocEngineException
{
    public const CONFIG_CONTROLLER_BAD_CLASS = 0x3000;
    public const WORLD_CONTROLLER_BAD_CLASS = 0x3001;
    public const ENTITY_CONTROLLER_BAD_CLASS = 0x3002;
    public const TICK_CONTROLLER_BAD_CLASS = 0x3003;
    public const COORDINATES_BAD_CLASS = 0x3004;
    public const RENDER_BAD_CLASS = 0x3005;
    public const GRID_BAD_CLASS = 0x3006;
    
    /**
     * @param string $given_class
     * @return FactoryException
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
     * @return FactoryException
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
     * @return FactoryException
     */
    public static function tickControllerBadClass(string $given_class): self
    {
        $required_class = TickControllerInterface::class;
        
        return new self (
            sprintf("Cannot instantiate the tick controller module using %s, as it must implement %s.", $given_class, $required_class),
            self::TICK_CONTROLLER_BAD_CLASS
        );
    }
    
    /**
     * @param string $given_class
     * @return FactoryException
     */
    public static function coordinatesBadClass(string $given_class): self
    {
        $required_class = CoordinatesInterface::class;
    
        return new self (
            sprintf("Cannot create a set of coordinates using %s, as it must implement %s.", $given_class, $required_class),
            self::COORDINATES_BAD_CLASS
        );
    }
    
    /**
     * @param string $given_class
     * @return FactoryException
     */
    public static function renderBadClass(string $given_class): self
    {
        $required_class = RenderInterface::class;
    
        return new self (
            sprintf("Cannot create a render using %s, as it must implement %s.", $given_class, $required_class),
            self::RENDER_BAD_CLASS
        );
    }
    
    /**
     * @param string $given_class
     * @return FactoryException
     */
    public static function gridBadClass(string $given_class): self
    {
        $required_class = GridInterface::class;
        
        return new self (
            sprintf("Cannot create a grid using %s, as it must implement %s.", $given_class, $required_class),
            self::GRID_BAD_CLASS
        );
    }
}
