<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Type;

use ReflectionClass;

/**
 * Havoc Engine entity type factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
abstract class TypeFactory
{
    /**
     * Create a new type.
     *
     * @param int $id
     * @param string $name
     * @param string $type_class
     * @return TypeInterface
     * @throws \ReflectionException
     */
    public static function new(int $id, string $name, string $type_class = Type::class): TypeInterface
    {
        $reflects = (new ReflectionClass($type_class))->implementsInterface(TypeInterface::class);
    
        if (false === $reflects) {
            throw TypeException::typeBadClass($type_class);
        }
    
        return new $type_class($id, $name);
    }
}
