<?php
declare(strict_types=1);

namespace Havoc\Engine\Coordinates;

use Havoc\Engine\Exceptions\HavocEngineException;

/**
 * Havoc Core configuration exceptions.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class CoordinatesException extends HavocEngineException
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
