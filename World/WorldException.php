<?php
declare(strict_types=1);

namespace Havoc\Engine\World;

use Havoc\Engine\Exceptions\HavocEngineException;

/**
 * Havoc Engine world exceptions.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class WorldException extends HavocEngineException
{
    public const WORLD_CONTROLLER_BAD_CLASS = 0x1;
    public const WORLD_POINT_BAD_CLASS = 0x2;
    
    /**
     * @param string $given_class
     * @return WorldException
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
     * @return WorldException
     */
    public static function worldPointBadClass(): self
    {
        return new self (
            "A world point given to the world grid does not implement WorldPointInterface.",
            self::WORLD_POINT_BAD_CLASS
        );
    }
}
