<?php
declare(strict_types=1);

namespace Havoc\Engine\Save\SaveCollection;

use Havoc\Engine\Save\SaveException;
use ReflectionClass;

/**
 * Havoc Engine save collection factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class SaveCollectionFactory
{
    /**
     * Create a new save controller.
     *
     * @param string $class_name
     * @return SaveCollectionInterface
     * @throws \ReflectionException
     */
    public static function new(string $class_name = SaveCollection::class): SaveCollectionInterface
    {
        $reflects = (new ReflectionClass($class_name))->implementsInterface(SaveCollectionInterface::class);
        
        if ($reflects === false) {
            throw SaveException::saveCollectionBadClass($class_name);
        }
        
        return new $class_name();
    }
}
