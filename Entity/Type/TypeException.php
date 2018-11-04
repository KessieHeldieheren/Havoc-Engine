<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Type;

use Havoc\Engine\Entity\Type\TypeCollection\TypeCollectionInterface;
use Havoc\Engine\Entity\Type\TypeSupervisor\TypeSupervisorInterface;
use Havoc\Engine\Core\EngineException;

/**
 * Havoc Engine type exceptions.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class TypeException extends EngineException
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
    public static function typeSupervisorBadClass(string $given_class): self
    {
        $required_class = TypeSupervisorInterface::class;
    
        return new self (
            sprintf("Cannot create the type controller using %s, as it must implement %s.", $given_class, $required_class),
            self::TYPE_CONTROLLER_BAD_CLASS
        );
    }
}
