<?php
declare(strict_types=1);

namespace Havoc\Engine\Coordinates;

use Havoc\Engine\Exceptions\EngineException;

/**
 * Havoc Engine configuration exceptions.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class CoordinatesException extends EngineException
{
    public const COORDINATES_BAD_CLASS = 0x6000;
    
    /**
     * @param string $given_class
     * @return CoordinatesException
     */
    public static function coordinatesBadClass(string $given_class): self
    {
        $required_class = CoordinatesInterface::class;
        
        return new self (
            sprintf("Cannot create a set of coordinates using %s, as it must implement %s.", $given_class, $required_class),
            self::COORDINATES_BAD_CLASS
        );
    }
}
