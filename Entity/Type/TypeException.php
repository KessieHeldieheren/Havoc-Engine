<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Type;

use Havoc\Engine\Exceptions\HavocEngineException;

/**
 * Havoc Core type exceptions.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class TypeException extends HavocEngineException
{
    public const TYPE_BAD_CLASS = 0x1;
    public const TYPE_COLLECTION_BAD_CLASS = 0x2;
    public const TYPE_CONTROLLER_BAD_CLASS = 0x3;
    
    /**
     * @param string $given_class
     * @return TypeException
     */
    public static function typeBadClass(string $given_class): self
    {
        $required_class = TypeInterface::class;
    
        return new self (
            sprintf("Cannot create a type using %s, as it must implement %s.", $given_class, $required_class),
            self::TYPE_BAD_CLASS
        );
    }
    
    /**
     * @param string $given_class
     * @return TypeException
     */
    public static function typeCollectionBadClass(string $given_class): self
    {
        $required_class = TypeCollectionInterface::class;
    
        return new self (
            sprintf("Cannot create a type collection using %s, as it must implement %s.", $given_class, $required_class),
            self::TYPE_COLLECTION_BAD_CLASS
        );
    }
    
    /**
     * @param string $given_class
     * @return TypeException
     */
    public static function typeControllerBadClass(string $given_class): self
    {
        $required_class = TypeSupervisorInterface::class;
    
        return new self (
            sprintf("Cannot create the type controller using %s, as it must implement %s.", $given_class, $required_class),
            self::TYPE_CONTROLLER_BAD_CLASS
        );
    }
}
