<?php
declare(strict_types=1);

namespace Havoc\Engine\Logger;

use Havoc\Engine\Exceptions\HavocEngineException;

/**
 * Havoc Engine log exceptions.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class LogException extends HavocEngineException
{
    public const LOG_CONTROLLER_BAD_CLASS = 0x1;
    public const LOG_BAD_CLASS = 0x2;
    public const LOG_DOES_NOT_EXIST = 0x3;
    
    /**
     * @param string $given_class
     * @return LogException
     */
    public static function logControllerBadClass(string $given_class): self
    {
        $required_class = LogControllerInterface::class;
        
        return new self (
            sprintf("Cannot instantiate the log controller module using %s, as it must implement %s.", $given_class, $required_class),
            self::LOG_CONTROLLER_BAD_CLASS
        );
    }
    
    /**
     * @param string $given_class
     * @return LogException
     */
    public static function logBadClass(string $given_class): self
    {
        $required_class = LogInterface::class;
    
        return new self (
            sprintf("Cannot create a log using %s, as it must implement %s.", $given_class, $required_class),
            self::LOG_BAD_CLASS
        );
    }
    
    /**
     * @param int $id
     * @return LogException
     */
    public static function logDoesNotExist(int $id): self
    {
        return new self (
            sprintf("No log with the ID of %s exists.", $id),
            self::LOG_DOES_NOT_EXIST
        );
    }
}
