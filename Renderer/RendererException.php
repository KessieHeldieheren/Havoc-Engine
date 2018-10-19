<?php
declare(strict_types=1);

namespace Havoc\Engine\Renderer;

use Havoc\Engine\Exceptions\HavocEngineException;

/**
 * Havoc Core renderer exceptions.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class RendererException extends HavocEngineException
{
    public const RENDERER_BAD_CLASS = 0x1;
    
    /**
     * @param string $given_class
     * @return RendererException
     */
    public static function rendererBadClass(string $given_class): self
    {
        $required_class = RendererInterface::class;
        
        return new self (
            sprintf("Cannot create a renderer using %s, as it must implement %s.", $given_class, $required_class),
            self::RENDERER_BAD_CLASS
        );
    }
}
