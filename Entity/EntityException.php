<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity;

use Havoc\Engine\Exceptions\HavocEngineException;

/**
 * Havoc Engine entity exceptions.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class EntityException extends HavocEngineException
{
    public const ENTITY_CONTROLLER_BAD_CLASS = 0x1;
    public const ENTITY_ID_ALREADY_SET = 0x2;
    public const ENTITY_BAD_CLASS = 0x3;
    public const ENTITY_COLLECTION_BAD_CLASS = 0x4;
    
    /**
     * @param string $given_class
     * @return EntityException
     */
    public static function entityControllerBadClass(string $given_class): self
    {
        $required_class = EntityControllerInterface::class;
        
        return new self (
            sprintf("Cannot instantiate the entity controller module using %s, as it must implement %s.", $given_class, $required_class),
            self::ENTITY_CONTROLLER_BAD_CLASS
        );
    }
    
    /**
     * @param int $original_id
     * @return EntityException
     */
    public static function entityIdAlreadySet(int $original_id): self
    {
        return new self (
            sprintf("Entity #%s already has an ID set. IDs may not be overwritten.", $original_id),
            self::ENTITY_ID_ALREADY_SET
        );
    }
    
    /**
     * @param string $given_class
     * @return EntityException
     */
    public static function entityBadClass(string $given_class): self
    {
        $required_class = EntityInterface::class;
        
        return new self (
            sprintf("Cannot create an entity using %s, as it must implement %s.", $given_class, $required_class),
            self::ENTITY_BAD_CLASS
        );
    }
    
    /**
     * @param string $given_class
     * @return EntityException
     */
    public static function entityCollectionBadClass(string $given_class): self
    {
        $required_class = EntityCollectionInterface::class;
        
        return new self (
            sprintf("Cannot create an entity collection using %s, as it must implement %s.", $given_class, $required_class),
            self::ENTITY_COLLECTION_BAD_CLASS
        );
    }
}
