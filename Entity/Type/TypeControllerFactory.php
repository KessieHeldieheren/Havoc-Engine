<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Type;

use Havoc\Engine\Entity\EntityCollectionInterface;
use ReflectionClass;

/**
 * Havoc Engine entity type controller factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class TypeControllerFactory
{
    /**
     * Create a new entity type controller.
     *
     * @param string $controller
     * @param EntityCollectionInterface $entity_collection
     * @return TypeControllerInterface
     * @throws \ReflectionException
     */
    public static function new(string $controller, EntityCollectionInterface $entity_collection): TypeControllerInterface
    {
        $reflects = (new ReflectionClass($controller))
            ->implementsInterface(TypeControllerInterface::class);
        
        if (false === $reflects) {
            throw TypeException::typeControllerBadClass($controller);
        }
        
        return new $controller($entity_collection);
    }
}
