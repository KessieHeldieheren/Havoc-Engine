<?php
declare(strict_types=1);

namespace Havoc\Engine\Config;

use Havoc\Engine\Core\EngineException;

/**
 * Havoc Engine configuration exceptions.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class ConfigException extends EngineException
{
    public const CONFIG_CONTROLLER_BAD_CLASS = 0x1;
    
    /**
     * @param string $given_class
     * @return ConfigException
     */
    public static function configControllerBadClass(string $given_class): self
    {
        $required_class = ConfigControllerInterface::class;
        
        return new self (
            sprintf("Cannot instantiate the config controller module using %s, as it must implement %s.", $given_class, $required_class),
            self::CONFIG_CONTROLLER_BAD_CLASS
        );
    }
}
