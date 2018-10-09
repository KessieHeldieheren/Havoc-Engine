<?php
declare(strict_types=1);

namespace Havoc\Engine\World;

use Havoc\Engine\Exceptions\HavocEngineException;

/**
 * Havoc Engine world exceptions.
 *
 * Exception set: 1.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class WorldException extends HavocEngineException
{
    public const WORLD_POINT_NOT_IMPLEMENTING = 0x1000;
    
    /**
     * @return WorldException
     */
    public static function worldPointNotImplementing(): self
    {
        return new self (
            "A world point given to the world grid does not implement WorldPointInterface.",
            self::WORLD_POINT_NOT_IMPLEMENTING
        );
    }
}
