<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation;

use Havoc\Engine\Exceptions\HavocEngineException;

/**
 * Havoc Core entity translation exceptions.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class TranslationException extends HavocEngineException
{
    public const TRANSLATION_CONTROLLER_BAD_CLASS = 0x1;
    
    /**
     * @param string $given_class
     * @return TranslationException
     */
    public static function translationControllerBadClass(string $given_class): self
    {
        $required_class = TranslationSupervisorInterface::class;
    
        return new self (
            sprintf("Cannot create the translation controller using %s, as it must implement %s.", $given_class, $required_class),
            self::TRANSLATION_CONTROLLER_BAD_CLASS
        );
    }
}
