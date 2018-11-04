<?php
declare(strict_types=1);

namespace Havoc\Engine\Save;

use Havoc\Engine\Core\EngineException;
use Havoc\Engine\Save\SaveCollection\SaveCollectionInterface;
use Havoc\Engine\Save\SaveController\SaveControllerInterface;
use Havoc\Engine\Save\SaveStorage\SaveStorageInterface;

/**
 * Havoc Engine save exceptions.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class SaveException extends EngineException
{
    public const SAVE_CONTROLLER_BAD_CLASS = 0x1;
    public const SAVE_COLLECTION_BAS_CLASS = 0x2;
    public const SAVE_IDENTIFIER_INVALID = 0x3;
    public const SAVE_STORAGE_BAD_CLASS = 0x4;
    
    /**
     * @param string $given_class
     * @return SaveException
     */
    public static function saveControllerBadClass(string $given_class): self
    {
        $required_class = SaveControllerInterface::class;
    
        return new self (
            sprintf("Cannot instantiate the save controller module using %s, as it must implement %s.", $given_class, $required_class),
            self::SAVE_CONTROLLER_BAD_CLASS
        );
    }
    
    /**
     * @param string $given_class
     * @return SaveException
     */
    public static function saveCollectionBadClass(string $given_class): self
    {
        $required_class = SaveCollectionInterface::class;
    
        return new self (
            sprintf("Cannot instantiate the save collection module using %s, as it must implement %s.", $given_class, $required_class),
            self::SAVE_COLLECTION_BAS_CLASS
        );
    }
    
    /**
     * @param string $identifier
     * @return SaveException
     */
    public static function saveIdentifierInvalid(string $identifier): self
    {
        return new self (
            sprintf("Cannot find any saves with the ID %s.", $identifier),
            self::SAVE_IDENTIFIER_INVALID
        );
    }
    
    /**
     * @param string $given_class
     * @return SaveException
     */
    public static function saveStorageBadClass(string $given_class): self
    {
        $required_class = SaveStorageInterface::class;
    
        return new self (
            sprintf("Cannot instantiate the save storage module using %s, as it must implement %s.", $given_class, $required_class),
            self::SAVE_STORAGE_BAD_CLASS
        );
    }
}
