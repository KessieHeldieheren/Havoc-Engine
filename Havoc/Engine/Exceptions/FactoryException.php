<?php
declare(strict_types=1);

namespace Havoc\Engine\Exceptions;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Coordinates\CoordinatesInterface;
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
    /**
     * @param string $given_class
     * @return FactoryException
     */
    public static function configControllerBadClass(string $given_class): self
    {
        $required_class = ConfigControllerInterface::class;
        
        return new self (
            sprintf("Cannot instantiate the config controller module using %s, as it must implement %s.", $given_class, $required_class),
            ExceptionCode::CONFIG_CONTROLLER_BAD_CLASS
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
            ExceptionCode::WORLD_CONTROLLER_BAD_CLASS
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
            ExceptionCode::TICK_CONTROLLER_BAD_CLASS
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
            ExceptionCode::COORDINATES_BAD_CLASS
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
            ExceptionCode::RENDER_BAD_CLASS
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
            ExceptionCode::GRID_BAD_CLASS
        );
    }
}
