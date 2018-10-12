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
    public const ENTITY_ID_ALREADY_SET = 0x8000;
    public const ENTITY_BAD_CLASS = 0x8001;
    
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
}
