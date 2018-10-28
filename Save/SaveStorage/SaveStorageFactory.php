<?php
declare(strict_types=1);

namespace Havoc\Engine\Save\SaveStorage;

use Havoc\Engine\Save\SaveCollection\SaveCollectionInterface;
use Havoc\Engine\Save\SaveException;
use Havoc\Engine\Save\SaveStorage\SaveStorageFilesystem\SaveStorageFilesystem;

/**
 * Havoc Engine save storage factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class SaveStorageFactory
{
    /**
     * Create a new save storage.
     *
     * @param SaveCollectionInterface $save_collection
     * @param string $location
     * @param string $class_name
     * @return SaveStorageInterface
     * @throws \ReflectionException
     */
    public static function new(SaveCollectionInterface $save_collection, string $location, string $class_name = SaveStorageFilesystem::class): SaveStorageInterface
    {
        $reflects = (new \ReflectionClass($class_name))->implementsInterface(SaveStorageInterface::class);
        
        if ($reflects === false) {
            throw SaveException::saveStorageBadClass($class_name);
        }
        
        return new $class_name($save_collection, $location);
    }
}
