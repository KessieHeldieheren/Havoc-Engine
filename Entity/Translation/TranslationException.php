<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation;

use Havoc\Engine\Entity\Translation\TranslationSupervisor\TranslationSupervisorInterface;
use Havoc\Engine\Exceptions\EngineException;

/**
 * Havoc Engine entity translation exceptions.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class TranslationException extends EngineException
{
    public const TRANSLATION_CONTROLLER_BAD_CLASS = 0x1;
    
    /**
     * @param string $given_class
     * @return TranslationException
     */
    public static function translationSupervisorBadClass(string $given_class): self
    {
        $required_class = TranslationSupervisorInterface::class;
    
        return new self (
            sprintf("Cannot create the translation controller using %s, as it must implement %s.", $given_class, $required_class),
            self::TRANSLATION_CONTROLLER_BAD_CLASS
        );
    }
}
